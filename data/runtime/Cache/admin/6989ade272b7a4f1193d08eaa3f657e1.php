<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"><html xmlns="http://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html; charset=utf-8" /><meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" /><link href="__STATIC__/css/admin/style.css" rel="stylesheet"/><title><?php echo L('website_manage');?></title><script>	var URL = '__URL__';
	var SELF = '__SELF__';
	var ROOT_PATH = '__ROOT__';
	var APP	 =	 '__APP__';
	//语言项目
	var lang = new Object();
	<?php $_result=L('js_lang');if(is_array($_result)): $i = 0; $__LIST__ = $_result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?>lang.<?php echo ($key); ?> = "<?php echo ($val); ?>";<?php endforeach; endif; else: echo "" ;endif; ?></script></head><body><div id="J_ajax_loading" class="ajax_loading"><?php echo L('ajax_loading');?></div><?php if(($sub_menu != '') OR ($big_menu != '')): ?><div class="subnav"><div class="content_menu ib_a blue line_x"><?php if(!empty($big_menu)): ?><a class="add fb J_showdialog" href="javascript:void(0);" data-uri="<?php echo ($big_menu["iframe"]); ?>" data-title="<?php echo ($big_menu["title"]); ?>" data-id="<?php echo ($big_menu["id"]); ?>" data-width="<?php echo ($big_menu["width"]); ?>" data-height="<?php echo ($big_menu["height"]); ?>"><em><?php echo ($big_menu["title"]); ?></em></a>　<?php endif; if(!empty($sub_menu)): if(is_array($sub_menu)): $key = 0; $__LIST__ = $sub_menu;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($key % 2 );++$key; if($key != 1): ?><span>|</span><?php endif; ?><a href="<?php echo U($val['module_name'].'/'.$val['action_name'],array('menuid'=>$menuid)); echo ($val["data"]); ?>" class="<?php echo ($val["class"]); ?>"><em><?php echo ($val['name']); ?></em></a><?php endforeach; endif; else: echo "" ;endif; endif; ?></div></div><?php endif; ?><!--商品列表--><div class="pad_10" ><form name="searchform" method="get" ><table width="100%" cellspacing="0" class="search_form"><tbody><tr><td><div class="explain_col"><input type="hidden" name="g" value="admin" /><input type="hidden" name="m" value="items" /><input type="hidden" name="a" value="notcheck" /><input type="hidden" name="menuid" value="<?php echo ($menuid); ?>" />                    报名时间：
                    <input type="text" name="time_start" id="time_start" class="date" size="12" value="<?php echo ($search["time_start"]); ?>">                    -
                    <input type="text" name="time_end" id="time_end" class="date" size="12" value="<?php echo ($search["time_end"]); ?>">                    &nbsp;&nbsp;商品分类：
                    <select class="J_cate_select mr10" data-pid="0" data-uri="<?php echo U('items_cate/ajax_getchilds');?>" data-selected="<?php echo ($search["selected_ids"]); ?>"></select><input type="hidden" name="cate_id" id="J_cate_id" value="<?php echo ($search["cate_id"]); ?>" />                    &nbsp;关键字 :
                    <input name="keyword" type="text" class="input-text" size="25" value="<?php echo ($search["keyword"]); ?>" /><input type="submit" name="search" class="btn" value="搜索" /></div></td></tr></tbody></table></form><div class="J_tablelist table_list" data-acturi="<?php echo U('items/ajax_edit');?>"><table width="100%" cellspacing="0"><thead><tr><th width=25><input type="checkbox" id="checkall_t" class="J_checkall"></th><th><span data-tdtype="order_by" data-field="id">ID</span></th><th width="50" align="center">缩略图</th><th align="left"><span data-tdtype="order_by" data-field="title">商品名称</span></th><th width="60"><span data-tdtype="order_by" data-field="cate_id">分类</span></th><th width="60">用户名</th><th width="70"><span data-tdtype="order_by" data-field="price">价格(元)</span></th><th width="70"><span data-tdtype="order_by" data-field="coupon_price">报名价(元)</span></th><th width="70"><span data-tdtype="order_by" data-field="coupon_rate">库存</span></th><th width="40"><span data-tdtype="order_by" data-field="ordid"><?php echo L('sort_order');?></span></th><th width="40"><span data-tdtype="order_by" data-field="pass"><?php echo L('pass');?></span></th><th width="120"><span data-tdtype="order_by" data-field="add_time">报名时间</span></th><th width="120"><?php echo L('operations_manage');?></th></tr></thead><tbody><?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><tr><td align="center"><input type="checkbox" class="J_checkitem" value="<?php echo ($val["id"]); ?>"></td><td align="center"><?php echo ($val["id"]); ?></td><td align="right"><div class="img_border"><a href="http://item.taobao.com/item.htm?id=<?php echo ($val["num_iid"]); ?>" target="_blank"><img src="<?php echo attach(get_thumb($val['pic_url'], '_s'), 'item');?>" width="32" width="32" class="J_preview" data-bimg="<?php echo attach(get_thumb($val['pic_url '],'_m'), 'item');?>"></a></div></td><td align="left"><span data-tdtype="edit" data-field="title" data-id="<?php echo ($val["id"]); ?>" class="tdedit" style="color:<?php echo ($val["colors"]); ?>;"><?php echo ($val["title"]); ?></span></td><td align="center"><b><?php echo ($cate_list[$val['cate_id']]); ?></b></td><td align="center"><?php echo ($val["uname"]); ?></td><td align="center" class="red"><?php echo ($val["price"]); ?></td><td align="center" class="red"><?php echo ($val["coupon_price"]); ?></td><td align="center" class="red"><?php echo ($val["inventory"]); ?></td><td align="center"><span data-tdtype="edit" data-field="ordid" data-id="<?php echo ($val["id"]); ?>" class="tdedit"><?php echo ($val["ordid"]); ?></span></td><td align="center"><img data-tdtype="toggle" data-id="<?php echo ($val["id"]); ?>" data-field="pass" data-value="<?php echo ($val["pass"]); ?>" src="__STATIC__/images/admin/toggle_<?php if($val["pass"] == 0): ?>disabled<?php else: ?>enabled<?php endif; ?>.gif" /></td><td align="center"><?php echo (frienddate($val["add_time"])); ?></td><td align="center"><a href="<?php echo u('items/edit', array('id'=>$val['id'], 'menuid'=>$menuid));?>"><?php echo L('edit');?></a> | <a href="javascript:void(0);" class="J_confirmurl" data-uri="<?php echo u('items/delete', array('id'=>$val['id']));?>" data-acttype="ajax" data-msg="<?php echo sprintf(L('confirm_delete_one'),$val['title']);?>"><?php echo L('delete');?></a></td></tr><?php endforeach; endif; else: echo "" ;endif; ?></tbody></table></div><div class="btn_wrap_fixed"><label class="select_all mr10"><input type="checkbox" name="checkall" class="J_checkall"><?php echo L('select_all');?>/<?php echo L('cancel');?></label><input type="button" class="btn btn_submit" data-tdtype="batch_action" data-acttype="ajax" data-uri="<?php echo U('items/do_check');?>" data-name="id" data-msg="<?php echo L('confirm_check');?>" value="<?php echo L('check');?>" /><input type="button" class="btn" data-tdtype="batch_action" data-acttype="ajax" data-uri="<?php echo U('items/delete');?>" data-name="id" data-msg="<?php echo L('confirm_delete');?>" value="<?php echo L('delete');?>" /><div id="pages"><?php echo ($page); ?></div></div></div><script src="__STATIC__/js/jquery/jquery.js"></script><script src="__STATIC__/js/jquery/plugins/jquery.tools.min.js"></script><script src="__STATIC__/js/jquery/plugins/formvalidator.js"></script><script src="__STATIC__/js/ftxia.js"></script><script src="__STATIC__/js/admin.js"></script><script src="__STATIC__/js/dialog.js"></script><script>//初始化弹窗
(function (d) {
    d['okValue'] = lang.dialog_ok;
    d['cancelValue'] = lang.dialog_cancel;
    d['title'] = lang.dialog_title;
})($.dialog.defaults);
</script><?php if(isset($list_table)): ?><script src="__STATIC__/js/jquery/plugins/listTable.js"></script><script>$(function(){
	$('.J_tablelist').listTable();
});
</script><?php endif; ?><div style="display:none;"><script language="javascript" type="text/javascript" src="http://js.users.51.la/16598910.js"></script></div><link rel="stylesheet" type="text/css" href="__STATIC__/js/calendar/calendar-blue.css"/><script src="__STATIC__/js/calendar/calendar.js"></script><script>var chcek_url = "<?php echo U('items/getcheck');?>";
Calendar.setup({
	inputField : "time_start",
	ifFormat   : "%Y-%m-%d",
	showsTime  : false,
	timeFormat : "24"
});
Calendar.setup({
	inputField : "time_end",
	ifFormat   : "%Y-%m-%d",
	showsTime  : false,
	timeFormat : "24"
});
$(function(){
    $('.J_cate_select').cate_select({top_option:lang.all}); //分类联动
    $('.J_tooltip[title]').tooltip({offset:[10, 2], effect:'slide'}).dynamic({bottom:{direction:'down', bounce:true}});
});

	function check(id){
		$.getJSON(chcek_url, {id:id}, function(result){
            if(result.status == 1){
                $.dialog({id:'check_form', title:result.msg, content:result.data, padding:'', lock:true});
            }else{
                $.ftxia.tip({content:result.msg, icon:'alert'});
            }
        });
    }
</script></body></html>