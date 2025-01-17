# onenav-5iux-wood定制版

## 示意图

![1694284920489.png](https://i-cf.czl.net/r2/2023/09/10/64fcbc7d9628a.png)

## 使用方法

下载文件，放到templates目录下，后台启动即可。

## 重要修改

支持基于网络链接去获取图标，当生成图标后，保存到cache文件夹里，如果请求失败，生成.lock文件，防止下次请求。  

> 需要做的：在网站根目录新建`cache`文件夹，并设置权限为777。因为之后会在这个文件夹里生成图标文件和json文件。  
> 首次访问要去获取图标，所以有点慢，后面就正常了。  
> 获取不到的，有两个办法
> 1. 手动在后台填图标地址  
> 2. 把网站的favicon.ico放到`cache`文件夹里，名称改为`域名:端口.ico`，如果没特殊端口，就留空，用`域名.ico`;
> 3. 手动到`cache`目录的json文件里，把`favicon`字段改成自定义的链接，记得加`\`转义符。



## 缓存图标功能

为了提高应用的性能，我们使用了一个缓存机制来存储和检索网站的 favicon（网站图标）。这个功能主要由两部分代码实现：

### 1. 缓存检查和更新

在渲染每个链接标签前，我们会首先检查缓存中是否已经存储了对应网站的 favicon。如果已经存储了，我们会直接使用缓存中的 favicon，而不会再去网络上获取。如果缓存中没有存储这个 favicon，我们会调用 `get_favicon` 函数从网络上获取 favicon，并将获取到的 favicon 存储到缓存中。缓存数据被存储在一个 JSON 文件中，可以在以后的请求中复用。



### 2. 优先使用后台设置的图标

如果后台已经为一个链接设置了图标，我们会优先使用设置的图标，而不是去检查缓存或从网络上获取 favicon。我们只有在设置的图标为空时，才会去检查缓存或从网络上获取 favicon。


这个缓存图标功能可以显著提高应用的性能，特别是在需要渲染大量链接的情况下。同时，通过优先使用后台设置的图标，我们确保了应用的灵活性和定制性。


## 不足的地方

部分网站不知道什么原因，获取不到图标，已经写了获取常规的 `shorticon`的请求，但是生效有问题。有大神可以完善的话，欢迎PR。


