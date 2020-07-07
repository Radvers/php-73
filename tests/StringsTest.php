<?php

use PHPUnit\Framework\TestCase;

class StringsTest extends TestCase
{
    /**
     * @see https://www.php.net/manual/en/language.types.string.php
     */
    public function testVariableParsing()
    {
        $foo = 'world';

        // Double quotes.
        $this->assertEquals('Hello world', "Hello $foo");

        // Single quotes.
        $this->assertEquals('Hello $foo', 'Hello $foo');

        //"Hello ${foo}"
        $this->assertEquals('Hello world', "Hello ${foo}");

        //"Hello " . $foo
        $this->assertEquals('Hello world', "Hello " . $foo);
        //Heredoc
        $this->assertEquals('Hello world', <<<FOO
Hello $foo
FOO
);
        //Nowdoc
        $this->assertEquals('Hello $foo', <<<'FOO'
Hello $foo
FOO
);
    }

    /**
     * @see https://www.php.net/manual/en/ref.strings.php
     */
    public function testStringFunctions()
    {
        // trim — Strip whitespace (or other characters) from the beginning and end of a string
        $this->assertEquals('Hello', trim('Hello         '));
        $this->assertEquals('Hello', trim('Hello......', '.'));

        // ltrim — Strip whitespace (or other characters) from the beginning of a string
        $this->assertEquals('Hello', ltrim('     Hello'));

        // rtrim — Strip whitespace (or other characters) from the end of a string
        $this->assertEquals('Hello', rtrim('Hello11111', 1));

        // strtoupper — Make a string uppercase
        $this->assertEquals('HELLO', strtoupper('hello'));

        // strtolower — Make a string lowercase
        $this->assertEquals('hello', strtolower('HeLlO'));

        // ucfirst — Make a string's first character uppercase
        $this->assertEquals('Hello', ucfirst('hello'));

        // lcfirst — Make a string's first character lowercase
        $this->assertEquals('hello', lcfirst('Hello'));

        // strip_tags — Strip HTML and PHP tags from a string
        $this->assertEquals('Hello', strip_tags('<h1>Hello</h1>'));

        // htmlspecialchars — Convert special characters to HTML entities
        $this->assertEquals('&amp;hello', htmlspecialchars('&hello'));

        // addslashes — Quote string with slashes
        $this->assertEquals("hello \'world\'", addslashes("hello 'world'"));

        // strcmp — Binary safe string comparison
        $this->assertEquals(-1, strcmp("Hello", "hello"));

        // strncasecmp — Binary safe case-insensitive string comparison of the first n characters
        $this->assertEquals(0, strcasecmp("Hello", "hello"));

        // str_replace — Replace all occurrences of the search string with the replacement string
        $this->assertEquals('hello universe', str_replace('world', 'universe', 'hello world'));

        // strpos — Find the position of the first occurrence of a substring in a string
        $this->assertEquals(1, strpos('Hello', 'e'));

        // strstr — Find the position of the first occurrence of a substring in a string
        $this->assertEquals('world', strstr('Hello world', 'w'));

        // strrchr — Find the last occurrence of a character in a string
        $this->assertEquals('orld', strrchr('Hello world', 'o'));

        // substr — Return part of a string
        $this->assertEquals('Hell', substr('Hello world', 0,4));

        // sprintf — Return a formatted string
        $this->assertEquals('Hello world',  sprintf("Hello %s", "world"));
    }
}