<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use Src\RegExp;

class RegExpUnitTest extends TestCase {
    public function testShouldIdentifyAValidUrlViaRegex() {
        $regexp = new RegExp('/^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/');
     
        $this->assertTrue($regexp->matchOne('http://www.google.com'));
        $this->assertTrue($regexp->matchOne('https://www.google.com'));
    }

    public function testShouldIdentifyAnInvalidUrlViaRegex() {
        $regexp = new RegExp('/^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/');
     
        $this->assertFalse($regexp->matchOne('aba://www.google'));
        $this->assertFalse($regexp->matchOne('abcdae'));
    }

    public function testShouldReturnAllTagsViaRegex() {
        $regexp = new RegExp('/<\/?[^>]*>/');

        $matches = $regexp->returnMatches('<html> <body> <h1> My title </h1> </body> </html>');
        $this->assertEquals(['<html>', '<body>', '<h1>', '</h1>', '</body>', '</html>'], $matches[0]);
    }

    public function testShouldReturnDuplicatedWordsViaRegex() {
        $regexp = new RegExp('/(\b\S+\b)\s+\b\1\b/');

        $matches = $regexp->returnMatches('hello hello world, batata batata hello world!');
        $this->assertEquals(['hello', 'batata'], $matches[1]);
    }

    public function testShouldTransformCpfUsingRegex() {
        $regexp = new RegExp('/(\d{3})(\d{3})(\d{3})(\d{2})/');

        $matches = $regexp->returnMatches('12345678910');
        $cpf = $matches[1][0] . '.' . $matches[2][0] . '.' . $matches[3][0] . '-' . $matches[4][0];

        $this->assertEquals('123.456.789-10', $cpf);
    }

    public function testShouldTransformCnpjUsingRegex() {
        $regexp = new RegExp('/(\d{2})(\d{3})(\d{3})(\d{4})(\d{2})/');

        $matches = $regexp->returnMatches('12345678901234');
        $cnpj = $matches[1][0] . '.' . $matches[2][0] . '.' . $matches[3][0] . '/' . $matches[4][0] . '-' . $matches[5][0];

        $this->assertEquals('12.345.678/9012-34', $cnpj);
    }

    public function testShouldTransformCepUsingRegex() {
        $regexp = new RegExp('/(\d{5})(\d{3})/');

        $matches = $regexp->returnMatches('12345678');
        $cep = $matches[1][0] . '-' . $matches[2][0];

        $this->assertEquals('12345-678', $cep);
    }

    public function testShouldTransformPhoneUsingRegex() {
        $regexp = new RegExp('/(\d{2})(\d{4})(\d{4})/');

        $matches = $regexp->returnMatches('12345678901');
        $phone = $matches[1][0] . '-' . $matches[2][0] . '-' . $matches[3][0];

        $this->assertEquals('12-3456-7890', $phone);
    }

    public function testShouldTransformDateUsingRegex() {
        $regexp = new RegExp('/(\d{2})(\d{2})(\d{4})/');

        $matches = $regexp->returnMatches('12122012');
        $date = $matches[1][0] . '/' . $matches[2][0] . '/' . $matches[3][0];

        $this->assertEquals('12/12/2012', $date);
    }

    public function testShouldTransformTimeUsingRegex() {
        $regexp = new RegExp('/(\d{2})(\d{2})(\d{2})/');

        $matches = $regexp->returnMatches('121212');
        $time = $matches[1][0] . ':' . $matches[2][0] . ':' . $matches[3][0];

        $this->assertEquals('12:12:12', $time);
    }
    
    public function testShouldTransformDateTimeUsingRegex() {
        $regexp = new RegExp('/(\d{2})(\d{2})(\d{4})(\d{2})(\d{2})(\d{2})/');

        $matches = $regexp->returnMatches('12122012121212');
        $datetime = $matches[1][0] . '/' . $matches[2][0] . '/' . $matches[3][0] . ' ' . $matches[4][0] . ':' . $matches[5][0] . ':' . $matches[6][0];

        $this->assertEquals('12/12/2012 12:12:12', $datetime);
    }
    
    public function testShouldTransformCurrencyUsingRegex() {
        $regexp = new RegExp('/(\d{1,3})(\d{3})(\d{3})(\d{3})(\d{1,2})/');

        $matches = $regexp->returnMatches('12345678901234');
        $currency = $matches[1][0] . '.' . $matches[2][0] . '.' . $matches[3][0] . '.' . $matches[4][0] . ',' . $matches[5][0];

        $this->assertEquals('123.456.789.012,34', $currency);
    }
}
