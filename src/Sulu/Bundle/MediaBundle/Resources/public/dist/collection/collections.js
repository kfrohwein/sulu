define(["mvc/collection","sulumedia/model/collection"],function(a,b){return a({model:b,url:function(){return"/admin/api/collections?depth=0"},parse:function(a){return a._embedded.collections}})});