Crowdtilt API
=============

This is a super simple wrapper that lets you get started integrating the Crowdtilt crowdfunding api into your project as quickly as posible. 

Basic format of api calls: $Crowdtilt->$request-type($api call);
please refer to the crowdtilt documentation for more information

example:
$Crowdtilt->get('users');

### Instalation
add the following to your composer.json file in your projects root directory

```
"require" :{
  "nwpointer/crowdtilt": "dev-master",
  ...any other packages you may need ...
}
```


alternatively you can also git clone it into your projects directory or add it as as submodule

```
git clone https://github.com/nwpointer/crowdtilt-api.git crowdtilt
```
or
```
git submodule add https://github.com/nwpointer/crowdtilt-api.git crowdtilt
```


