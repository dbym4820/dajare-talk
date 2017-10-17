jQuery(function($) {
    var $view = $('#view'),
	$data = $('input[name="data"]');

    /**
     * データ取得
     */
    function getData() {
	$.post('comet.php?mode=view', {}, function(data) {
	    $view.html(data);
	    checkUpdate();
	});
    }

    /**
     * 更新チェック
     */
    function checkUpdate() {
	$.post('comet.php?mode=check', {}, function(data) {
	    $view.html(data);
	    checkUpdate();
	});
    }

    $('#add').submit(function(event) {
	event.preventDefault();
	$.post('comet.php?mode=add', {data: $data.val()}, function(data) {
	    $data.val('');
	});
    });

    getData();
});


