define(['core', 'tpl'], function(core, tpl) {
	var modal = {
		page: 1,
		category: 0
	};
	modal.init = function(params) {
		modal.category = params.category;
		modal.getList();
		$('.container').infinite({
			onLoading: function() {
				modal.getList()
			}
		});
		
		$(".dv-tab").click(function(){
			var cate=$(this).data('cid');
			$('.dv-tab').removeClass('active');
			$(this).addClass('active');
			
			modal.changeTab(cate);
		});
		
		
	};
	modal.changeTab = function(category) {
		
		$('.container').infinite('init');
		$('.content-empty').hide(), 
		$('.container').html(''), 
		$('.infinite-loading').show();
		modal.page = 1, 
		modal.category = category, 
		modal.getList()
	};
	modal.loading = function() {
		modal.page++
	};
	modal.getList = function() {
		core.json('goods/get_dv_list', {
			page: modal.page,
			category: modal.category
		}, function(ret) {
			var result = ret.result;
			if (result.total <= 0) {
				$('.content-empty').show();
				$('.container').infinite('stop')
			} else {
				$('.content-empty').hide();
				$('.dv-tab-show').infinite('init');
				if (result.list.length <= 0 || result.list.length < result.pagesize) {
					$('.container').infinite('stop')
				}
			}
			modal.page++;
			core.tpl('.container', 'tpl_dv_goods', result, modal.page > 1);
			
		})
	};
	return modal
});