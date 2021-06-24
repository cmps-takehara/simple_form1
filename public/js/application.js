/***********************************************************
 * コンテンツ毎の共通JS
 * create :
 * update :
 * 必須JS  ： 
 **********************************************************/

var App = App || {};

App = (function($, window, document){
    
    var App = {};
    
    App.TEST = true; // デバックフラグ
    App.BASE_URL = "";
    
    // -------------------------------------------------
    // グローバル設定
    // -------------------------------------------------
    
    if (!window.console) console = {log: function() {}};
    
    if (typeof Object.create !== 'function') {
        Object.create = function(o, props) {
            function F() {}
            F.prototype = o;
            if (typeof(props) === "object") {
                for (var prop in props) {
                    if (props.hasOwnProperty((prop))) {
                    F[prop] = props[prop];
                    }
                }
            }
            return new F();
        };
    }
    
    if (App.TEST) {
        window.onerror = function (message, url, line, column, errorObj) {
            // console.log("message : " + message +
            //             ",\n url : " + url +
            //             ",\n line : " + line  +
            //             ",\n column : " + column  +
            //             ",\n error : " + (errorObj ? errorObj.stack : ""));
            
            console.table({
                        'message' : message,
                        'url' : url,
                        'line' : line ,
                        'column' : column,
                        'error' : (errorObj ? errorObj.stack : "")
                    });
                
            return false;
        };
    }
    
    if (!Array.prototype.indexOf) {
      Array.prototype.indexOf = function(elt /*, from*/)
      {
        var len = this.length >>> 0;

        var from = Number(arguments[1]) || 0;
        from = (from < 0) ? Math.ceil(from) : Math.floor(from);
        if (from < 0)
          from += len;

        for (; from < len; from++)
        {
          if (from in this &&
              this[from] === elt)
            return from;
        }
        return -1;
      };
    }
    
    
    // -------------------------------------------------
    // 共通
    // -------------------------------------------------
    App.Common = function () {
        
    };
    
    var Common = App.Common.prototype;
    
    /**
     * Ajaxで取得したJSONデータを加工
     * @param {object} obj $.ajaxの引数
     */
    Common.setJsonData = function(obj) {
        var self     = this,
            xhr      = $.ajax({
                type: (obj.type) ? obj.type : 'post',
                url: obj.url,
                data: obj.data,
                dataType: (obj.dataType) ? obj.dataType : 'json',
                scriptCharset: 'utf-8'
            }),
            successFn = obj.success,
            errorFn   = obj.error || function(result){
                alert("通信エラーによりデータを取得できませんでした");
            };
        
        if (typeof successFn === "function") {
            xhr.done(function(result){
                successFn(result);
            });
        }
        xhr.fail(function(result){
            errorFn('error!');
        });
        
        return xhr;
    };
    
    
    // -------------------------------------------------
    // 共通クラス
    // -------------------------------------------------
    App.Main = function () {
        App.Common.apply(this, arguments);
        this.initialize.apply(this, arguments);
    };
    
    // Common継承
    App.Main.prototype = Object.create(App.Common.prototype, {
        constructor: {value: App.Main, enumerable: false}
    });
    
    var Main = App.Main.prototype;
    
    // 初期化
    Main.initialize = function (base_url) {
        App.BASE_URL = base_url;
        
        this.events();
    };
    
    // イベント登録
    Main.events = function () {
        var self = this;
        
    };
    
    
    // -------------------------------------------------
    // FORMクラス
    // -------------------------------------------------
    App.Form = function () {
        App.Common.apply(this, arguments);
        this.initialize.apply(this, arguments);
    };
    
    // Common継承
    App.Form.prototype = Object.create(App.Common.prototype, {
        constructor: {value: App.Form, enumerable: false}
    });
    
    var Form = App.Form.prototype;
    
    // 初期化
    Form.initialize = function () {
        
        this.events();
    };
    
    // イベント登録
    Form.events = function () {
        var self = this;
        
        
    };
    
    
    // 数字キー判定
    Form.checkNumKey = function(event) {
        var evt = event || window.event;
        var c = evt.keyCode;
        // Shiftキー無効
        if (evt.shiftKey) {
            if (c !== 9) {
                return false;
            }
        }
        if((48<=c && c<=57) || (96<=c && c<=105) || c==8 || c == 9 || c == 13 || c == 37 || c == 39 || c == 46 || c == 18 || c == 109 || c == 110 || c == 189 || c == 229 || c == 190 || (112<=c && c<=123) ){
            return c;
        }
        return false;
    };
    
    // 数字のみ設定
    Form.numOnry = function() {
        var self = this,
            $elm = $('.js_numOnry');
        $elm.attr('pattern', '\\d*');
        $elm.on('keydown keyup', self.checkNumKey);
    };
    
    /**
     * 郵便番号住所検索
     */
    Form.insertAddress = function(optionObj, opt_callback) {
        this.option = optionObj;
        this.callback = opt_callback;
        this.init();
    };
    Form.insertAddress.prototype = {
        init : function() {
            this.event();
        },
        event : function() {
            var self = this;
            $('#user_zip1').jpostal({
                click : "#zip_btn",
                postcode : [
                    '#user_zip1',
                    '#user_zip2'
                ],
                address : {
                    '#pref'          : '%3',
                    '#pref_kana'     : '%8',
                    '#city'          : '%4',
                    '#city_kana'     : '%9',
                    '#address1'      : '%5',
                    '#address1_kana' : '%10',
                    '#pref_code'     : '%11'
                },
                callback : function (address) {
                    $(self.option.pref_kana + "_text").text(address[6]);
                    $(self.option.pref + "_text").text(address[1]);
                    $(self.option.city_kana + "_text").text(address[7]);
                    $(self.option.city + "_text").text(address[2]);
                    
                    if (typeof self.callback === "function") {
                        self.callback();
                    }
                }
            });
        },
        clear : function() {
            // 初期化処理
            $(this.option.pref_kana).val('');
            $(this.option.pref_kana + "_text").text('');
            
            $(this.option.pref).val('');
            $(this.option.pref + "_text").text('');
            $(this.option.pref + "_code").val('');
            
            $(this.option.city_kana).val('');
            $(this.option.city_kana + "_text").text('');
            
            $(this.option.city.tag).val('');
            $(this.option.city.tag + "_text").text('');
            
            $(this.option.address_kana).val('');
            $(this.option.address).val('');
        }
    };
    
    
    /**
     * パスワード表示切替
     * @param  {string} elm パスワード切替発動ID
     */
    Form.showPassword = function(elm){
        var self = this,
            $elm = $(elm),
            $row = $elm.find('.form-group');
        $elm.addClass('showPassword');
        $row.find('a').on('click', function(event) {
            event.preventDefault();
            var $input = $(this).closest('div').prev().find('input');
            if ($input.attr('type') === 'text') {
                $input.prop('type', 'password');
                $(this).text('表示する');
            } else {
                $input.prop('type', 'text');
                $(this).text('隠す');
            }
        });
    };
    
    // private method
    // ---------------------------------------------------------- //
    
    
    // プラグインの有無確認
    function pluginExists( pluginName ){
        return [pluginName] || $.fn[pluginName] ? true : false;
    }
    
    // NaN判定
    function valueIsNaN(v) {
        return v !== v;
    }
    
    // デバック用
    function assert(condition, opt_message) {
        if (!condition) {
            if (window.console) {
                // メッセージの表示
                console.log('Assertion Failure');
                if (opt_message) console.log('Message: ' + opt_message);
                // スタックトレースの表示
                if (console.trace) console.trace();
                if (Error().stack) console.log(Error().stack);
            }
            // デバッガーを起動し、ブレークする
            debugger;
        }
    }
    
    return App;
    
})(jQuery, window, document);

$(function(window){
    window.app = new App.Main('./');
    window.appForm = new App.Form();
}(window));
