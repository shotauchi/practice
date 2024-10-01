let message = "今日は良い天気です";
console.log(message);

// 文字列の検索
let search1 = message.indexOf('良い');      // 「良い」があるか検索
let search2 = message.indexOf('悪い');      // 「悪い」があるか検索

console.log(search1);
console.log(search2);

// 文字列の置換
let replace1 = message.replace('良い','悪い');  //　「良い」を「悪い」に置換
console.log(replace1);

// 文字列の削除
let del1 = message.replace('良い','');        //　「良い」に空白文字に置換（つまり削除）
console.log(del1);