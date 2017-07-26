##封装的方法预览##

* getElementsByClassName ：处理低版本IE的兼容性问题；

* toJSON ：JSON格式的字符串转成JSON对象；

* isType ：判断数据类型

* listToArray ：类数组转为数组；（arguments）

**设置DOM的方法**

* etEleChildren ：获取元素下面的指定的标签名的元素集合；

* etFirst ：第一个元素节点

* getPre ：相邻哥哥的元素节点

* getPres：相邻哥哥们的元素节点

* getNext：相邻弟弟的元素节点

* getNexts：相邻弟弟们的元素节点

* getSibling：上一个哥哥和下一个弟弟

* getSiblings：所有的兄弟们（除了自己）

* getIndex：获取索引值

* insertAfter：在指定目标元素oldEle后面插入新元素newEle；如果没有传指定元素，则直接添加在后面；这个方法好像没啥实际意义；可以通过insertBefore变相实现；

* prependChild ：把一个元素节点添加为parentEle的第一个子节点；

* innerHTML ：获取元素的innerHTML；

* text ：获取和设置innerHTML；