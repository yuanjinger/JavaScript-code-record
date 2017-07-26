#反转字符串#

>function reverseString(str) { 
return str.split('').reverse().join(''); 
}
reverseString("hello");

##求一个数的阶乘##

>function reverseString(str) { 
return str.split('').reverse().join('');
}

##回文数判断##

>function palindrome(str) { 
Return  str.replace(/[\W_]/g,'').toLowerCase() ===str.replace(/[\W_]/g,'').toLowerCase().split('').reverse().join('');}

function palindrome(str) { 
str = str.toLowerCase().replace(/[\W_]/g, ''); 
for(var i = 0, len = str.length - 1; i < len/2; i++) { 
if(str[i] !== str[len-i]) { 
return false; 
} 
} 
return true; 
}

##找出句子中最长的单词##

>function findLongestWord(str) {
var words = str.split(' '); 
var maxLength = 0; 
for (var i = 0; i < words.length; i++) { 
if (words[i].length > maxLength) { 
maxLength = words[i].length; 
} 
} 
return maxLength; 
}
运用 .reduce()
function findLongestWord(s) {
  return s.split(' ')
    .reduce(function(x, y) {
      return Math.max(x, y.length)
    }, 0);
}
拓展：forEach、map和reduce
数组 arr = [1,2,3,4] 求数组的和
forEach 实现
var arr = [1,2,3,4],
sum = 0;
arr.forEach(function(e){sum += e;});       // sum = 10 
map 实现
var arr = [1,2,3,4],
sum = 0;
arr.map(function(obj){sum += obj});//return undefined array. sum = 10  
reduce实现
var arr = [1,2,3,4];
arr.reduce(function(pre,cur){return pre + cur}); 
Reduce求最大值
Var max = a.reduce(
function(pre,cur,inde,arr){
return pre>cur?pre:cur;
});
至此，我们可以很形象的归纳出来forEach、map以及reduce的不同点：
forEach 方法是将数组中的每一个值取出做一些程序员想让他们做的事情
map 方法 是将数组中的每一个值放入一个方法中做一些程序员想让他们做的事情后返回一个新的数组
reduce 方法 将数组中的每一个值与前面的被返回相加的总和(初试值为数组的第一个值或者initialValue)


##句子中的首字母转为大写##

function titleCase(str) { 
var convertToArray = str.toLowerCase().split(" "); 
var result  =  convertToArray.map(function(val){
return  val.replace(val.charAt(0), val.charAt(0).toUpperCase()); 
});
return result.join(" "); 
} 
titleCase("I'm a little tea pot"7);

function  titleCase(str)  { 
return   str.toLowerCase().replace(/(?:^|\s)\S/g,function(a) { return a.toUpperCase(); }); 
} 
titleCase("I'm a little tea pot");

##返回数组中最大的数字##

基本代码解决方案：
function largestOfFour(arr) {
  var results = [];
  for (var n = 0; n < arr.length; n++) {
    var largestNumber = arr[n][0];
    for (var sb = 1; sb < arr[n].length; sb++) {
      if (arr[n][sb] > largestNumber) {
        largestNumber = arr[n][sb];
      }
    }
    results[n] = largestNumber;
  }
  return results;
}       

中间代码解决方案：（声明式）
function largestOfFour(arr) {
  return arr.map(function(group){
    return group.reduce(function(prev, current) {
      return (current > prev) ? current : prev;
    });
  });
}

高级代码解决方案：（声明式）
function largestOfFour(arr) {
  return arr.map(Function.apply.bind(Math.max, null));
}

##确认字符串以目标子串结尾##

 基本代码解决方案
function confirmEnding(str, target) {
  return str.substr(-target.length) === target;
}

function confirmEnding(str, target) {
  return str.substring(str.length-target.length)===target;
}
confirmEnding("Bastian", "n");

##parseInt() 函数定义和用法##

 基本代码解决方案
function repeatStringNumTimes(str, num) {
  var accumulatedStr = '';
  while (num > 0) {
    accumulatedStr += str;
    num--;
  }
  return accumulatedStr;
}

中间代码解决方案
function repeatStringNumTimes(str, num) {
  if(num < 0)
    return "";
  if(num === 1)
    return str;
  else
    return str + repeatStringNumTimes(str, num - 1);
}

高级代码解决方案
//String.prototype.repeat()返回一个新字符串，该字符串包含被连接在一起的指定数量的字符串的副本。
function repeatStringNumTimes(str, num) {
  return num > 0 ? str.repeat(num) : '';
}
repeatStringNumTimes("abc", 3);

##截断字符串：如果长度超过指定的最大长度，则需要减小字符串的长度或截断长度，并添加...到最后。如果不是那么长，那么我们保持原样。##

基本代码解决方案
function truncateString(str, num) {
  // Clear out that junk in your trunk
  if (str.length > num && num > 3) {
    return str.slice(0, (num - 3)) + '...';
  } else if (str.length > num && num <= 3) {
    return str.slice(0, num) + '...';
  } else {
    return str;
  }
}
 高级代码解决方案
function truncateString(str, num) {
  if (str.length <= num) {
    return str;
  } else {
    return str.slice(0, num > 3 ? num - 3 : num) + '...';
  }
}

##编写一个将数组（第一个参数）分成组，每组长度（第二个参数）的函数，并将其作为二维数组返回。##

1.(['a', 'b', 'c', 'd'], 2) 预计会是 [['a', 'b'], ['c', 'd']]
2.([0, 1, 2, 3, 4, 5], 3) 预计会是 [[0, 1, 2], [3, 4, 5]]
3.([0, 1, 2, 3, 4, 5], 2) 预计会是 [[0, 1], [2, 3], [4, 5]]
4.([0, 1, 2, 3, 4, 5], 4) 预计会是 [[0, 1, 2, 3], [4, 5]]
基本代码解决方案
function chunkArrayInGroups(arr, size) {
  var temp = [];
  var result = [];
  for (var a = 0; a < arr.length; a++) {
    if (a % size !== size - 1)
      temp.push(arr[a]);
    else {
      temp.push(arr[a]);
      result.push(temp);
      temp = [];
    }
  }
  if (temp.length !== 0)
    result.push(temp);
  return result;
}

中间代码解决方案
function chunkArrayInGroups(arr, size) {
  // Break it up.
  var arr2 = [];
  for (var i = 0; i < arr.length; i+=size) {
  arr2.push(arr.slice(i , i+size));
  }
  return arr2;
}
 高级代码解决方案
function chunkArrayInGroups(arr, size) {
  // Break it up.
  var newArr = [];
  var i = 0;
  while (i < arr.length) {
    newArr.push(arr.slice(i, i+size));
    i += size;
  }
  return newArr;
}
chunkArrayInGroups(["a", "b", "c", "d"], 2);


##截取数组固定数量元素##

例如：slasher([1, 2, 3], 2);必须返回[3]。

 基本代码解决方案
function slasher(arr, howMany) {
  // remove the head
  arr.splice(0, howMany);
  // return the remaining or the tail
  return arr;
}
slasher([1, 2, 3], 2);

中间代码解决方案
function slasher(arr, howMany) {
  // Return string after the amount chopped off.
  return arr.slice(howMany);
}

##如果数组的第一个元素中的字符串包含数组的第二个元素中的字符串的所有字母，则返回true。##

基本代码解决方案
程序
function mutation(arr) {
  var test = arr[1].toLowerCase();
  var target = arr[0].toLowerCase();
  for (i=0;i<test.length;i++) {
    if (target.indexOf(test[i]) === -1)
      return false;
  }
  return true;
 }

中间代码解决方案
陈述
function mutation(arr) {
  return arr[1].toLowerCase()
    .split('')
    .every(function(letter) {
      return arr[0].toLowerCase()
        .indexOf(letter) !== -1;
    });
}

##从数组中删除所有的伪造值（undefined，null，NaN，0，“”）。##
 高级代码解决方案
function bouncer(arr) {
  return arr.filter(Boolean);
}
代码说明：
该Array.prototype.filter方法需要一个返回的函数Boolean值，其采用单个参数，并返回true用于truthy值或false用于falsy值。所以我们通过了内置的Boolean功能。


##删除数组中和参数相同的元素##

 基本代码解决方案
function destroyer(arr) {
  var args = Array.prototype.slice.call(arguments);
  for (var i = 0; i < arr.length; i++) {
    for (var j = 1; j < args.length; j++) {
      if (arr[i] === args[j]) {
        delete arr[i];
      }
    }
  }
  return arr.filter(Boolean);
}
 中间代码解决方案
function destroyer(arr) {
  var args = Array.from(arguments).slice(1);
  return arr.filter(function(val) {
    return !args.includes(val);
  });
}

测试：destroyer([1, 2, 3, 1, 2, 3], 2, 3)should return [1, 1].
##根据参数返回一个索引##
 
基本代码解决方案
function getIndexToIns(arr, num) {
  arr.sort(function(a, b) {
    return a - b;
  });
  for (var a = 0; a < arr.length; a++) {
    if (arr[a] >= num)
      return a;
  }
  return arr.length;
}
 中间代码解决方案
function getIndexToIns(arr, num) {
  arr.push(num);
  arr.sort(function(a, b){return a-b});
  return arr.indexOf(num);
}
 高级代码解决方案
由@nivrith
function getIndexToIns(arr, num) {return arr.concat(num).sort((a,b) => a-b).indexOf(num);
}
getIndexToIns([1,3,4],2);



测试：getIndexToIns([1,2,3,4], 1.5)should return 1
getIndexToIns([2, 5, 10], 15)should return 3.
##写出凯撒移位密码（移动13位）解码##
使用String.charCodeAt（）将英文字符转换为ASCII。
使用String.fromCharCode（）将ASCII转换为英文字符。
 基本代码解决方案
function rot13(str) {
  // 生成字符数组
  return str.split('')
  // 迭代数组中的每个字符
    .map.call(str, function(char) {
      // 将字符转换位Ascii码
      x = char.charCodeAt(0);
      // 如果角色不是大写英文字母（即它的ascii不在65和91之间），我们将保持原样并继续下一次迭代
      if (x < 65 || x > 90) {
        return String.fromCharCode(x);  // Return un-converted character
      }
      //如果ascii代码小于78，那么当减去13时，它会超出范围，所以我们将添加26（英文字母数字），以便在A之后它将返回到Z
      else if (x < 78) {
        return String.fromCharCode(x + 13);
      }
      // 如果是大写英文字母，我们将从它的ascii代码中减去13个字母。
      return String.fromCharCode(x - 13);
    }).join('');  // Rejoin the array into a string
}
 中间代码解决方案
// Solution with Regular expression and Array of ASCII character codesfunction rot13(str) {
  var rotCharArray = [];
  var regEx = /[A-Z]/ ;
  str = str.split("");
  for (var x in str) {
    if (regEx.test(str[x])) {
      rotCharArray.push((str[x].charCodeAt() - 65 + 13) % 26 + 65);
    } else {
      rotCharArray.push(str[x].charCodeAt());
    }
  }
  str = String.fromCharCode.apply(String, rotCharArray);
  return str;
}// Change the inputs below to test
rot13("LBH QVQ VG!");
代码说明：
在一个变量中创建一个空数组，rotCharArray用于存储字符代码。
所述regEx变量存储一个正则表达式的所有大写字母从A到Z
我们分割str成一个字符数组，然后使用一个for循环遍历数组中的每个字符。
使用if语句，我们测试查看字符串是否只包含从A到Z的大写字母。
如果它返回true，我们使用charCodeAt()函数和rot13变换返回正确的值，否则返回初始值。
然后我们从该rotCharArray变量返回带有字符代码的字符串。

 高级代码解决方案
function rot13(str) { // LBH QVQ VG!
  return str.replace(/[A-Z]/g, L => String.fromCharCode((L.charCodeAt(0) % 26) + 65));
}

测试：
rot13("SERR PBQR PNZC") should decode to "FREE CODE CAMP"
rot13("SERR CVMMN!") should decode to "FREE PIZZA!"
求和范围内所有数字
 基本代码解决方案
function sumAll(arr) {
    var max = Math.max(arr[0], arr[1]);
    var min = Math.min(arr[0], arr[1]);
    var temp = 0;
    for (var i=min; i <= max; i++){
        temp += i;
    }
  return(temp);
}
sumAll([1, 4]);
 中间代码解决方案
function sumAll(arr) {
  // Using ES6 arrow function (one-liner)
  var sortedArr = arr.sort((a,b) => a-b);
  var firstNum = arr[0];
  var lastNum = arr[1];
  // 使用算术推理求和公式
  var sum = (lastNum - firstNum + 1) * (firstNum + lastNum) / 2;
  return sum;
}
 高级代码解决方案
function sumAll(arr) {
var sum = 0;
//使用扩展运算符（... arr）允许将实际数组传递给函数而不是逐个元素。
    for (var i = Math.min(...arr); i <= Math.max(...arr); i++){
        sum += i;
    }
  return sum;
}
sumAll([1, 4]);

测试：
sumAll([1, 4]) should return 10.
sumAll([4, 1]) should return 10.


##检查两个数组，并返回一个仅包含不在原始数组中的项的新数组。[1, 2, 3, 5], [1, 2, 3, 4, 5] should return [4].##
 基本代码解决方案（必备解决方案）：
function diffArray(arr1, arr2) {
  var newArr = [];
  
  function onlyInFirst(first, second) {
  // Looping through an array to find elements that don't exist in another array
    for (var i=0;i<first.length;i++) {
      if (second.indexOf(first[i]) === -1) {
        // Pushing the elements unique to first to newArr
        newArr.push(first[i]);
      }
    }
  }
  
  onlyInFirst(arr1, arr2);
  onlyInFirst(arr2, arr1);
  
  return newArr;
}
diffArray([1, 2, 3, 5], [1, 2, 3, 4, 5]);
 中间代码解决方案（声明式解决方案）：
function diffArray(arr1, arr2) {
  return arr1
    .concat(arr2)
.filter(
  //筛选出不包含在arr1,或不包含arr2中的元素
        item => !arr1.includes(item) || !arr2.includes(item)
    )
}
diffArray([1, 2, 3, 5], [1, 2, 3, 4, 5]);
 高级代码解决方案（声明式解决方案）：
function diffArray(arr1, arr2) {
    return arr1
      .filter(el => !arr2.includes(el))
      .concat(
        arr2.filter(el => !arr1.includes(el))
      )
}
diffArray([1, 2, 3, 5], [1, 2, 3, 4, 5]);
测试：
[1, 2, 3, 5], [1, 2, 3, 4, 5]should return [4].
[1, "calf", 3, "piglet"], [7, "filly"] should return [1, "calf", 3, "piglet", 7, "filly"]

##创建一个将整数转换为罗马数字的程序。##
 基本代码解决方案
var convertToRoman = function(num) {
  var decimalValue = [ 1000, 900, 500, 400, 100, 90, 50, 40, 10, 9, 5, 4, 1 ];
  var romanNumeral = [ 'M', 'CM', 'D', 'CD', 'C', 'XC', 'L', 'XL', 'X', 'IX', 'V', 'IV', 'I' ];
  var romanized = '';
  for (var index = 0; index < decimalValue.length; index++) {
    while (decimalValue[index] <= num) {
      romanized += romanNumeral[index];
      num -= decimalValue[index];
    }
  }
  return romanized;
}// test here
convertToRoman(36);
代码说明：
创建一个数组的Roman Numerals（romans）。
使用for循环创建数字中数字（ints）的数组。
循环通过数组（基数10），并按照您的要求，将Roman Numeral（base 5）索引增加2（numeral = romans[i*2]）。
在循环中，使用开关盒将正确的罗马数字（向后）推送到该阵列上。
反转罗马数字数组并将其变成字符串。
测试：convertToRoman(2) should return "II".
convertToRoman(3) should return "III".
##array第一个参数提供一个参数，并返回一个array与传递的第二个参数object中的所有属性和值匹配的所有s Object。##
基本代码解决方案
function whatIsInAName(collection, source) {
  // "What's in a name? that which we call a rose
  // By any other name would smell as sweet.”
  // -- by William Shakespeare, Romeo and Juliet
  var srcKeys = Object.keys(source);
  // filter the collection
  return collection.filter(function (obj) {
    for(var i = 0; i < srcKeys.length; i++) {
      if(!obj.hasOwnProperty(srcKeys[i]) || obj[srcKeys[i]] !== source[srcKeys[i]]) {
        return false;
      }
    }
    return true;
  });
}// test here
whatIsInAName([{ first: "Romeo", last: "Montague" }, { first: "Mercutio", last: null }, { first: "Tybalt", last: "Capulet" }], { last: "Capulet" });
中间代码解决方案
function whatIsInAName(collection, source) {
  // "What's in a name? that which we call a rose
  // By any other name would smell as sweet.”
  // -- by William Shakespeare, Romeo and Juliet
  var srcKeys = Object.keys(source);
  return collection.filter(function (obj) {
    return srcKeys.every(function (key) {
      return obj.hasOwnProperty(key) && obj[key] === source[key];
    });
  });
}// test here
whatIsInAName([{ first: "Romeo", last: "Montague" }, { first: "Mercutio", last: null }, { first: "Tybalt", last: "Capulet" }], { last: "Capulet" });
高级代码解决方案
function whatIsInAName(collection, source) {
  // "What's in a name? that which we call a rose
  // By any other name would smell as sweet.”
  // -- by William Shakespeare, Romeo and Juliet
  var srcKeys = Object.keys(source);
  // filter the collection
  return collection.filter(function (obj) {
    return srcKeys
      .map(function(key) {
        return obj.hasOwnProperty(key) && obj[key] === source[key];
      })
      .reduce(function(a, b) {
        return a && b;
      });
  });
}// test here
whatIsInAName([{ first: "Romeo", last: "Montague" }, { first: "Mercutio", last: null }, { first: "Tybalt", last: "Capulet" }], { last: "Capulet" });
