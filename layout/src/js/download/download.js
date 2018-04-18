'use strict';

let totop = require('../common/totop.module');

$(() => {
    let util = {
        dateFormat: function (timestamp, format) {
            let targetDate = (timestamp instanceof Date)
                ? timestamp
                : new Date(timestamp);
            let targetFormat = format || 'yyyy-mm-dd';

            let paddingZero = function (str) {
                str = str.toString();
                str = (str.length < 1)
                    ? ('0' + str)
                    : str;
                return str;
            };

            let yearString = targetDate.getFullYear();
            let monthString = paddingZero((targetDate.getMonth() + 1).toString());
            let dateString = paddingZero(targetDate.getDate());
            let hourString = paddingZero(targetDate.getHours());
            let minuteString = paddingZero(targetDate.getMinutes());
            let secondString = paddingZero(targetDate.getSeconds());

            return targetFormat
                .replace(/yyyy/g, yearString)
                .replace(/mm/g, monthString)
                .replace(/dd/g, dateString)
                .replace(/HH/g, hourString)
                .replace(/MM/g, minuteString)
                .replace(/SS/g, secondString);
        },

        sizeFormat: function (size) {
            let units = ['KB', 'MB', 'GB'];
            let resultUnit = '';
            let resultSize = size;

            (units).forEach((currentUnit, level) => {
                if (level !== (units.length - 1)) {
                    if (resultSize >= 1024) {
                        resultSize /= 1024;
                    } else {
                        resultUnit = resultUnit || currentUnit;
                    }
                } else {
                    resultUnit = resultUnit || units[units.length - 1];
                }
            });

            return (resultSize.toFixed(2) + resultUnit);
        }
    };

    let page = {
        param: {
            page: 1,
            pageSize: 20
            // query: ''
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
            1: 'fa-file-text-o',
            2: 'fa-file-archive-o'
        },

        init: function () {
            totop.init();

            // load more click handler
            this.eles.downloadFetch.on('click', (e) => {
                e.preventDefault();
                this.param.page = +this.eles.downloadFetch.attr('data-page');
                this.fetchData();
            });

            // search button click handler
            this.eles.downloadSearchButton.on('click', () => {
                this.param.page = 0;
                this.param.query = $.trim(this.eles.downloadSearchInput.val());
                this.eles.downloadList.html('');
                this.fetchData();
            });

            // request param init
            let currentSearchParam = this.getPageParamObject();
            this.param.page = currentSearchParam.page || 1;
            // this.param.query = currentSearchParam.query || '';

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

                    // add page param
                    this.eles.downloadFetch.attr({ 'data-page': data.page.current + 1 });

                    // check data
                    if (data.list && data.list.length > 0) {
                        data.list.forEach((downloadItem) => {
                            // make params
                            downloadItem.type = this.typeiconMap[downloadItem.type];
                            downloadItem.modify_time = util.dateFormat(downloadItem.modify_time, 'yyyy-mm-dd');
                            downloadItem.size = util.sizeFormat(downloadItem.size);
                            this.eles.downloadList.append(
                                ejs.render(this.tpls.downloadItem, downloadItem)
                            );
                        });
                    }

                    // check has more
                    if (data.page.current < data.page.page_total) {
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