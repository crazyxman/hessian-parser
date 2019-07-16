# Hessian-parser
Hessian format data parse

### Add feature
add multi value parse. The following is the splicing of two serialized data together.The original function will stop when it resolves to the first stage.
<br />
E.g:
![avatar](https://github.com/crazyxman/Attachment/blob/master/images/hessian_parser_img1.png)
<br />
This is the original data after base64_encode:
```
$str = "2rsCFAAAAAAAAAAAAAAA95RDMCRjb20ua2FpeXVhbi5wMnAuY29tbW9uLnJlc3VsdC5SZXN1bHSZEWZhdWx0ZWRQcm9wZXJ0aWVzC2Vycm9yQ29kZXMxCmVycm9yQ29kZXMKcmVzdWx0Q29kZQhlbnRpdGllcwVpdGVtcwtyZXN1bHRQYXJ0cwxpc1N1Y2Nlc3NmdWwGc3RhdHVzYHAUamF2YS51dGlsLkxpbmtlZExpc3RwkHCQTk5xE2phdmEudXRpbC5BcnJheUxpc3QwJDliZTUxNjE0LTJmNDktNDZhNS05N2M1LWJlZmVlZTZjYjNhZkhaVMjISAVkdWJibwUyLjAuMlo="
$str = base64_decode($str);
$dp = new DubboParser();
$data = $ps->getData($str);
```
