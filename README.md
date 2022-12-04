## 百度bce语义分析sdk（Laravel版）

````
composer require "jose-chan/baidu-bce-sdk"
````
#### 配置

```shell
php artisan vendor:publish
```

在.env文件中增加以下配置
> BAIDU_BCE_API_KEY=你的应用key\
> BAIDU_BCE_API_SECRET=你的应用secret


#### 使用

````php
<?php

use JoseChan\BaiduBceSdk\BaiduBce;

// 词性分析
$lexer = BaiduBce::lexer(["text" => "穆尼里奥是一位伟大的足球教练"]);

````
