# Concurrency whit abstraction

This is a small sped testing between Spaghetti code and Abstraction code, fight

## In the PhpUnit under docker

```
▶ ./phpunit tests/Implement
PHPUnit 5.7.27 by Sebastian Bergmann and contributors.

.....                                                               5 / 5 (100%)

Time: 344 ms, Memory: 6.00MB

OK (5 tests, 9 assertions)
                                                                                                                                                                                                                        
▶ ./phpunit tests/Abstraction  
PHPUnit 5.7.27 by Sebastian Bergmann and contributors.

.....                                                               5 / 5 (100%)

Time: 285 ms, Memory: 6.00MB

OK (5 tests, 9 assertions)
```

* Spaghetti method
`Time: 344 ms, Memory: 6.00MB`
* Abstraction method
`Time: 285 ms, Memory: 6.00MB`


## In the php test server (php -S) under docker

```
▶ ./curlTime 'http://localhost:8001/implement'

Connect time: 0.004615seg
Transfer time: 0.146898seg <-
Total time: 0.148355seg

proyect/phpslim-test/concurrency-slim                                                                                                                                                                                                                        
▶ ./curlTime 'http://localhost:8001/abstract' 

Connect time: 0.005304seg
Transfer time: 0.161433seg <-
Total time: 0.162296seg
```

* Spaghetti method
`Time: 146.8 ms`
* Abstraction method
`Time: 161.4 ms`

## Reflection

Looking at these tests, is it necessary to write Spaghetti code to 
accelerate the platforms with concurrency?

## Run the server
`./run`
