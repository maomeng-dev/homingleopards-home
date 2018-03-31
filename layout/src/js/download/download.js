'use strict';

let totop = require('../common/totop.module');

$(() => {
    let page = {
        param: {
            page: 0,
            query: ''
        },

        eles: {
            'downloadLoading': $('#downloadLoading'),
            'downloadMore': $('#downloadMore'),
            'downloadSearchInput': $('#downloadSearchInput'),
            'downloadSearchButton': $('#downloadSearchButton')
        },

        init: function () {
            totop.init();
            this.searchInit();
        },

        getPageParamString: function () {
            let result = '';
            $.each(this.param, (key, value) => {
                result += ('&' + key + '=' + value);
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
                this.eles.downloadMore.show();
            } else {
                this.eles.downloadMore.hide();
            }
        },

        searchInit: function () {
            this.eles.downloadMore.on('click', () => {
                this.param.page++;
                this.fetchData();
            });

            this.eles.downloadSearchButton.on('click', () => {
                this.param.page = 0;
                this.param.query = $.trim(this.eles.downloadSearchInput.val());
                this.fetchData();
            });
        },

        fetchData: function () {
            this.showLoading(true);
            this.showMore(false);

            // change state
            window.history.pushState(this.param, document.title, (location.origin + location.pathname + this.getPageParamString()));

            $.ajax({
                url: '/',
                data: this.param
            }).done((res) => {
                this.showLoading(false);
                this.showMore(false);
                console.log(res);
            });
        }
    };

    page.init();
});