## 百度bce语义分析sdk（Laravel版）

````
composer require "jose-chan/baidu-bce-sdk"
````
#### 配置

```shell
php artisan vendor:publish
```


#### 使用

````php
<?php

use JoseChan\BaiduBceSdk\BaiduBce;

// 词性分析
$lexer = BaiduBce::lexer(["text" => "穆尼里奥是一位伟大的足球教练"]);

````
