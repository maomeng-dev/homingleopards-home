'use strict';

let totop = require('../common/totop.module');

$(() => {
    let page = {
        param: {
            page: 1,
            pageSize: 20,
            query: ''
        },

        eles: {
            'downloadList': $('#downloadList'),
            'downloadLoading': $('#downloadLoading'),
            'downloadFetch': $('#downloadFetch'),
            'downloadSearchInput': $('#downloadSearchInput'),
            'downloadSearchButton': $('#downloadSearchButton')
        },

        tpls: {
            downloadItem: $('#downloadItemTemplate').html()
        },

        typeiconMap: {
            1: 'fa-file-archive-o',
            2: 'fa-file-text-o'
        },

        init: function () {
            totop.init();

            this.eles.downloadFetch.on('click', (e) => {
                e.preventDefault();
                this.fetchData();
            });

            this.eles.downloadSearchButton.on('click', () => {
                this.param.page = 0;
                this.param.query = $.trim(this.eles.downloadSearchInput.val());
                this.eles.downloadList.html('');
                this.fetchData();
            });

            let currentSearchParam = this.getPageParamObject();
            this.param.page = currentSearchParam.page || 1;
            this.param.query = currentSearchParam.query || '';

            // first fetch
            this.fetchData();
        },

        getPageParamObject: function () {
            let result = {};
            let searchString = location.search.slice(1);
            searchString.split('&').forEach((str) => {
                let strArr = str.split('=');
                result[strArr[0]] = strArr[1];
            });
            return result;
        },

        getPageParamString: function () {
            let result = '';
            $.each(this.param, (key, value) => {
                if (key === 'page' || key === 'query') {
                    result += ('&' + key + '=' + value);
                }
            });
            result = result.slice(1);
            result = '?' + result;
            return result;
        },

        showLoading: function (flag) {
            if (flag) {
                this.eles.downloadLoading.fadeIn(200);
            } else {
                this.eles.downloadLoading.fadeOut(200);
            }
        },

        showMore: function (flag) {
            if (flag) {
                this.eles.downloadFetch.show();
            } else {
                this.eles.downloadFetch.hide();
            }
        },

        fetchData: function () {
            this.showLoading(true);
            this.showMore(false);
            // set param
            this.param.page = +this.eles.downloadFetch.attr('data-page');

            // change state
            // window.history.pushState(this.param, document.title, (location.origin + location.pathname + this.getPageParamString()));

            $.ajax({
                url: '//api.homingleopards.org/front/download/list',
                data: this.param
            }).done((res) => {
                this.showLoading(false);

                if (res.errno === 0) {
                    let data = res.data;

                    // check data
                    if (data.list && data.list.length > 0) {
                        data.list.forEach((downloadItem) => {
                            downloadItem.type = this.typeiconMap[downloadItem.type];
                            this.eles.downloadList.append(
                                ejs.render(this.tpls.downloadItem, downloadItem)
                            );
                        });
                    }

                    // check has more
                    if (data.page.current < data.page.page_total) {
                        this.eles.downloadFetch.attr({ 'data-page': data.page.current + 1 });
                        this.showMore(true);
                    } else {
                        this.showMore(false);
                    }
                } else {
                    alert(res.errmsg);
                }
            });
        }
    };

    page.init();
});