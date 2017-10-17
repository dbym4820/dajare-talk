
var ui = new BotUI('chat-app');

//ボット側のチャット処理
ui.message.bot({
    
    //メッセージを表示する
    content: 'こんにちは，ダジャレボットです！<br />何か話しかけてください．'
    
}).then(function (){
    wait();
});

// 入力を受け付ける
function wait(){
    ui.action.text({
	action: {
	    placeholder: '質問を入力してください'
	}	
    }).then(function(resText){
	var returnSentence;
	$.ajax({
	    type: 'POST',
	    url: '/bot.php',
	    data: {
		"call": resText
	    }
	}).then(function(res){
	    returnSentence = res;
	    console.log(returnSentence);
	
	    // //「ボタン」を表示する
	    ui.message.bot({
		delay: 500,
		loading: true,
		content: returnSentence
		
	    }).then(function (){
		ui.message.update({
		    delay: 500
		}).then(function (){
		    wait();
		});
	    });
	    wait();
	});
    });
}


function getTalk(text){
    
}

