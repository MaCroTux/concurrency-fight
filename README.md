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


# Using bombardier a HTTP(S) benchmarking tool

> Url: https://github.com/codesenberg/bombardier

```
./bombardier-darwin-amd64 -c 100 -n 20 http://localhost:8080/implement && ./bombardier-darwin-amd64 -c 100 -n 20 http://localhost:8080/abstract 
Bombarding http://localhost:8080/implement with 20 request(s) using 100 connection(s)
 20 / 20 [========================================================================================================================================================================================================================================] 100.00% 3s
Done!
Statistics        Avg      Stdev        Max
  Reqs/sec         7.11      16.51      67.93
  Latency         1.40s   823.54ms      2.88s
  HTTP codes:
    1xx - 0, 2xx - 20, 3xx - 0, 4xx - 0, 5xx - 0
    others - 0
  Throughput:     2.93KB/sBombarding http://localhost:8080/abstract with 20 request(s) using 100 connection(s)
 20 / 20 [========================================================================================================================================================================================================================================] 100.00% 3s
Done!
Statistics        Avg      Stdev        Max
  Reqs/sec         6.79      15.98      53.69
  Latency         1.42s      0.85s      2.96s
  HTTP codes:
    1xx - 0, 2xx - 20, 3xx - 0, 4xx - 0, 5xx - 0
    others - 0
  Throughput:     2.84KB/s   
```
