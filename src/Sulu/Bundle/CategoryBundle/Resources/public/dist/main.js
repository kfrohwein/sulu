require.config({paths:{sulucategory:"../../sulucategory/dist",sulucategorycss:"../../sulucategory/css","type/categoryList":"../../sulucategory/dist/validation/types/categoryList"}}),define(["config","css!sulucategorycss/main"],function(a){return{name:"SuluCategoryBundle",initialize:function(b){"use strict";var c="categoryLocale",d=function(){return b.sandbox.sulu.getUserSetting(c)||b.sandbox.sulu.getDefaultContentLocale()},e=function(a){b.sandbox.emit("sulu.router.navigate","settings/categories/"+a,!1,!1)},f=function(a,c,d){b.sandbox.emit("sulu.router.navigate","settings/categories/"+a+"/edit:"+c+"/"+d,!1,!1)},g=function(a,c,d){b.sandbox.emit("sulu.router.navigate","settings/categories/"+a+"/new/"+(d?d+"/":"")+c,!1,!1)};a.set("sulu_category.user_settings.category_locale",c),b.sandbox.urlManager.setUrl("category","settings/categories/<%= locale %>/edit:<%= id %>/details"),b.components.addSource("sulucategory","/bundles/sulucategory/dist/components"),b.sandbox.mvc.routes.push({route:"settings/categories",callback:function(){var a=d();return e(a),'<div data-aura-component="categories@sulucategory" data-aura-display="list" data-aura-locale="'+a+'"/>'}}),b.sandbox.mvc.routes.push({route:"settings/categories/:locale",callback:function(a){return'<div data-aura-component="categories@sulucategory" data-aura-display="list" data-aura-locale="'+a+'"/>'}}),b.sandbox.mvc.routes.push({route:"settings/categories/new/:parent/:content",callback:function(a,b){var c=d();return g(c,b,a),'<div data-aura-component="categories@sulucategory" data-aura-display="edit" data-aura-parent="'+a+'" data-aura-locale="'+c+'"/>'}}),b.sandbox.mvc.routes.push({route:"settings/categories/:locale/new/:parent/:content",callback:function(a,b){return'<div data-aura-component="categories@sulucategory" data-aura-display="edit" data-aura-parent="'+b+'" data-aura-locale="'+a+'"/>'}}),b.sandbox.mvc.routes.push({route:"settings/categories/new/:content",callback:function(a){var b=d();return g(b,a),'<div data-aura-component="categories@sulucategory" data-aura-display="edit" data-aura-locale="'+b+'"/>'}}),b.sandbox.mvc.routes.push({route:"settings/categories/:locale/new/:content",callback:function(a){return'<div data-aura-component="categories@sulucategory" data-aura-display="edit" data-aura-locale="'+a+'"/>'}}),b.sandbox.mvc.routes.push({route:"settings/categories/edit::id/:content",callback:function(a,b){var c=d();return f(c,a,b),'<div data-aura-component="categories@sulucategory" data-aura-display="edit" data-aura-id="'+a+'" data-aura-locale="'+c+'"/>'}}),b.sandbox.mvc.routes.push({route:"settings/categories/:locale/edit::id/:content",callback:function(a,b){return'<div data-aura-component="categories@sulucategory" data-aura-display="edit" data-aura-id="'+b+'" data-aura-locale="'+a+'"/>'}})}}});