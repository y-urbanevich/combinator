Combinator
==========

Get all possible combinations from arrays.

Installation
------------
The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
composer require y-urbanevich/combinator:"dev-master"
```

or add

```json
"y-urbanevich/combinator" : "dev-master"
```

to the require section of your application's `composer.json` file.

Example
-------

```
use Urbanevich\Combinator;

class SomeClass {

    public function someFunction() {


        //array with your arrays
        $arrays = array(
            array(1, 2, 3, 4, 5, 6),
            array('A', 'B', 'C', 'A', 'B', 'C'),
            array('Value1', 'Value2', 'Value3')
        );

        /*
         * set true if you want get combination with empty value. Default false.
         */
        $empty = true;

        /*
         * set true if you want get unique combination. Default false.
         */
        $unique = true;

        $combinations = Combinator::getCombs($arrays, $empty, $unique);
    }
}
```


> [Yaroslav Urbanevich](http://exe.kh.ua) 
