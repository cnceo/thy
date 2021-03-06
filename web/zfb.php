﻿
<!doctype html><html><head><meta http-equiv="x-ua-compatible" content="IE=edge"><meta name="renderer" content="webkit"><meta charset="UTF-8"><meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"><meta name="viewport" content="minimal-ui,width=device-width,initial-scale=1,maximum-scale=1,minimum-scale=1,user-scalable=no"><meta name="apple-mobile-web-app-capable" content="yes"><meta name="apple-mobile-web-app-status-bar-style" content="white"><meta name="format-detection" content="telephone=no"><link rel="stylesheet" href="/assets/stylesheets/d9ad581f.download.css"><script type="text/javascript" charset="utf-8">startTime = new Date();</script></head><body class=""><div class="masklayer" id="MaskLayer" style="display:none"></div><span class="pattern left"><img src="/images/download_pattern_left.png"></span> <span class="pattern right"><img src="/images/download_pattern_right.png"></span><div class="out-container"><div class="main"></div></div><script type="text/template" id="loading"><div class='loading-container'>
      <h1>{{LOADING}}</h1>
    </div></script><script type="text/template" id="wechat_notice"><div class="notice-wechat">
      <div class="wechat-tips">
        <span class="<%=locale%>">
          {{if is_ios}}
            {{GO_OUT_WECHAT_IOS_TIP}}
          {{else}}
            {{GO_OUT_WECHAT_TIP}}
          {{/if}}
        </span>
        <img src="/images/short-arrow.png">
      </div>
    </div></script><script type="text/template" id="app_bottom_fixed"><div class="app_bottom_fixed">
      <a onClick='FIR.clickFooterAd()' href='{{redirect_url}}' target='_blank'>
        <img src='{{content}}' />
      </a>
    </div></script><script type="text/template" id="meta"><title>{{name}} - fir.im</title>
    <link rel="apple-touch-icon" href="{{icon_url}}">
    <link rel="apple-touch-icon-precomposed" href="{{icon_url}}">

    <meta itemprop="name" content="{{name}}">
    <meta itemprop="image" content="{{icon_url}}">
    <meta itemprop="version" content="{{master.version}}">
    <meta itemprop="description" content="{{desciption}}">

    <meta name="twitter:card" content="{{screenshots[0]}}">
    <meta name="twitter:site" content="{{full_short}}">
    <meta name="twitter:title" content="{{name}}">
    <meta name="twitter:description" content="{{desciption}}">
    <meta name="twitter:image:src" content="{{icon_url}}">

    <meta property="og:title"       content="{{name}} - fir.im">
    <meta property="og:type"        content="website">
    <meta property="og:url"         content="{{full_short}}">
    <meta property="og:image"       content="{{icon_url}}">
    <meta property="og:description" content="{{desciption}}">
    <meta property="og:site_name"   content="fir.im"></script><script type="text/template" id="meta_simple"><title>{{name}} - fir.im</title></script><script type="text/template" id="error"><table>
      <tr>
        <td>
          <div class="app-brief text-center">
            <h1>{{FAILED_LOAD_APP}}</h1>
            <button>重新加载</button>
          </div>
        </td>
      </tr>
    </table></script><script type="text/template" id="data_error"><table>
      <tr>
        <td>
          <div class="app-brief text-center">
            <h1>{{DATA_ERROR}}</h1>
            {{if is_mobile}}
            <p class="no-release-tips">{{DATA_INCOMPLETE_IN_MOBILE}}</p>
            {{else}}
            <p class="no-release-tips">{{DATA_INCOMPLETE}}</p>
            {{/if}}
          </div>
        </td>
      </tr>
    </table></script><script type="text/template" id="not_found"><header class="fade-out">
      <div class="table-container">
        <div class="cell-container">
          <div class="error-container">
            <h1>{{NOT_FOUND_TITLE}}</h1>
            <pre>var not_found = true;
if(not_found){
  App = Page = null;
  console.log("{{NOT_FOUND_LOG}}");
}</pre>
          <h3 class="visiable-moblie">{{AUTO_RETURN_HOME}}</h3>
          </div>
        </div>
      </div>
    </header></script><script type="text/template" id="legal_forbidden"><header class="fade-out">
      <div class="table-container">
        <div class="cell-container">
          <div class="error-container">
            <h1>{{LEGAL_FORBIDDEN}}</h1>
            <pre>var legal_forbidden = true;
if(legal_forbidden){
  App = Page = null;
  console.log("{{LEGAL_FORBIDDEN_LOG}}");
}</pre>
          <h3 class="visiable-moblie">{{AUTO_RETURN_HOME}}</h3>
          </div>
        </div>
      </div>
    </header></script><script type="text/template" id="constraint"><header>
      <div class="table-container">
        <div class="cell-container">
          <div class="error-container">
            <h1>到达每日下载上限<wbr/>请联系开发者</h1>
            <small class="sub-header">
              想要了解详情请&nbsp;<a href="http://blog.fir.im/authentication-restriction-faq">查看文档</a>
            </small>
            <pre>var download_count = 0;
if(!download_count){
  App = Page = null;
  console.log("到达每日下载上限，请联系开发者");
}</pre>
          </div>
        </div>
      </div>
    </header></script><script type="text/template" id="expired"><header>
      <div class="table-container">
        <div class="cell-container">
          <div class="error-container error-legal-forbidden">
            <h1>应用已过期</h1>
            <pre>var is_expired = true;
if(is_expired){
  App = Page = null;
  console.log("开发者长期未更新此应用，更新后可下载");
}</pre>
          </div>
        </div>
      </div>
    </header></script><script type="text/template" id="passwd"><table>
      <tr>
        <td>
          <div class="app-brief text-center">
            <div class="icon-container wrapper">
              <i class="icon-icon_path bg-path"></i>
              <span class="icon">
                <img src="{{app.icon_url}}" itemprop="image">
              </span>
              <span class="qrcode">
              </span>
            </div>
            <p class="release-type wrapper">&nbsp;</p>
            <h1 class="name wrapper">
              <span class="icon-warp">
                <i class="icon-{{app.type}}"></i>
                {{app.name|chop>20}}
              </span>
            </h1>
            <form onsubmit="return FIR.confirmPasswd()">
              <h4 id='required-pwd'>{{REQUIRE_PWD}}</h4>
              <h4 id='passwd-wrong'>{{PASSWORD_WRONG}}</h4>
              <input id="passwdField" name='passwd' type="password" autofocus required>
              <br><br>
              <button id="confirmPwd" type="button">{{CONFIRM}}</button>
            </form>
          </div>
        </td>
      </tr>
    </table></script><script type="text/template" id="forbidden"><header class="fade-out">
      <div class="table-container">
        <div class="cell-container">
          <div class="error-container">
            <h1>{{FORBIDDEN_TITLE}}</h1>
            <pre>var is_member = false;
if(!is_member){
  console.log("{{FORBIDDEN_TITLE_LOG}}");
}</pre>
          </div>
        </div>
      </div>
    </header></script><script type="text/template" id="virus_result"><span class="tip {{status}}" id="tip">
      {{if status|equals>SCANED}}
        <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACAAAAAlCAYAAAAjt+tHAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAyNpVFh0WE1MOmNvbS5hZG9iZS54bXAAAAAAADw/eHBhY2tldCBiZWdpbj0i77u/IiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkIj8+IDx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IkFkb2JlIFhNUCBDb3JlIDUuNS1jMDE0IDc5LjE1MTQ4MSwgMjAxMy8wMy8xMy0xMjowOToxNSAgICAgICAgIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6eG1wPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvIiB4bWxuczp4bXBNTT0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL21tLyIgeG1sbnM6c3RSZWY9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZVJlZiMiIHhtcDpDcmVhdG9yVG9vbD0iQWRvYmUgUGhvdG9zaG9wIENDIChNYWNpbnRvc2gpIiB4bXBNTTpJbnN0YW5jZUlEPSJ4bXAuaWlkOkFCM0VDNjcwRUI2QTExRTQ5RkU2RjNCMkU0ODQ2NEI4IiB4bXBNTTpEb2N1bWVudElEPSJ4bXAuZGlkOkFCM0VDNjcxRUI2QTExRTQ5RkU2RjNCMkU0ODQ2NEI4Ij4gPHhtcE1NOkRlcml2ZWRGcm9tIHN0UmVmOmluc3RhbmNlSUQ9InhtcC5paWQ6QUIzRUM2NkVFQjZBMTFFNDlGRTZGM0IyRTQ4NDY0QjgiIHN0UmVmOmRvY3VtZW50SUQ9InhtcC5kaWQ6QUIzRUM2NkZFQjZBMTFFNDlGRTZGM0IyRTQ4NDY0QjgiLz4gPC9yZGY6RGVzY3JpcHRpb24+IDwvcmRmOlJERj4gPC94OnhtcG1ldGE+IDw/eHBhY2tldCBlbmQ9InIiPz6Ihqn6AAAFaklEQVR42nRYS4hdRRCtunkjCBGioGDAiFkEoigZQz6IqBDQhSJ+QcGVoKIguEuycCviQgIuXSqMihAkIQuF4GcrziQzQXEWhrhQUDAfSHAwUzl9u7r7VN/nG/p237pd1dVVp6qrZ/bh6cel/QxN8ZdG5jSt9DIHM27C4H5QH0Q/oK2grWLGVQuyMr/ig5nRWGo/c4Gj/PGDL15o+G010wfQ7wXTHhD3Yt69GC+IBYWvY/wr6Csgr6jqMvplfPp7VAMfkhKQRfqZzBJ7Ho/CbsNjEf3iuDuzRTDuAu9gvqGyk7JB1brPLaDtxufdoL3cNiMXRoWyldAsKfdblqcyg05HMNgP4h4Q7ylcWbBWc7mOv2OhNZDOoq2CdA6079HfMlpSm2Lk1h2QgCZPN5fKRVfkNFygb4Kwo07Pml+WvMAaKGfFdA2y0cvFCRpUNjNfVpZkuC7a0KV5Dto2vD2GfuesLTxOeRfTP4VVzqsUgdlF6iuXnoHUoNqAFnAoEoDI0B7KS9IO/TIe5zsTsgsqp1KMEA4kbqhpwVGgpNtQ3GZutzKx8pex8i6aIm0Z63bqyvlE32CwWJo76zZb/cQIHxcyygsaLWzEp9b7PdF4Q/E3BDOlv4p6i2Yvviv2IyWVTG7CyluO/frFpGNHGJqHTwQj+dMqGBuiJIanEDgkWjGipUzzRJczYTSP0ru6aasbnMk45nW6YFUumb5L4zVUXdmBzSi9+aSzV3ZSdQ27lSKJXCoh7Niy49yUYhnK1T9Gh4jHHOO6Kl0iwWpqp4RjAUs1QrpwHXiTNs2jAQvNWjoxZX9mNreQBGsc5osOcxcgZJvI5OAhLAUAcyQxT4yM6LeZ1eQxityK2be2cI8BzzleXQPwXcJo09hmc1L1uJVxDV1IR3yJuFlGphbUflZCrM/jyhnRhELTtuHbpZhFC1C14aSp/iRGJ8s6Q1/AmEV3VMRT3MscUxodFNktGqJFCVENN2MUaCfUQuwLZbG2M8psJQWrTpJQiwKTeDQ1aw58mgkVIaEq9JiVAFiN0UAVU0R94bUuM3hNaMxdYDenGipHMPk+QrxmRyWQdgGt8UgveeA/7SsINqEx2SYQ0ADSViiYlbzZu04WyK1XkgKrzYcaBNQkOafUK+bnWiKmXevcZyXH7GqA1fWkwJfKwLL+ALMa/8VSNokEwo1ZTNvWZ0Z5gVBwIlVEX+B9vQpyJVoSiTFXkW3zyrYuq0qzkG/iefT7XMYFKLWULLCBWe8oe1W7fCB02Hj98L/p1VGv0+LndvB81DaiRyDr2uD+O4XnscmtqiaOLutIVzFxteTWicbTdG84ge93OmkJfEueiGqWO4zhN3ReUZRZyGChvJ5kSw3Ywe8OtK/RDjhbAv0boSx3oRsgPoPhDwVALaqoiKCYboUs1QdBQXsIjx8xOuic65h/CKMrrSx3M/sd8SqYnsD78XkpPyPcqBKWcLa3kltvRvceRt+BepcXNel++AjGf/G9e+gKnTS4hgkvYvB+kdlSRKv0pyXcqNYWPF4Bz8/oj6aiN29Qv8L4UdD/rJcT5xks3GKqwOtoR9GewusfXJ7XI0FD7ki36rfRfoGsTzDnbhe1gXmHMeNZjC8rW9KBOuNY7Y0O0il096H/AF9eRT+EgiTj4qQDbKGrin+CTPDomVJztGOmHdVDuERpOH3Lyz94vIbP6Z8Ux2v92Yz2cFt8/JIs9jraPsg8o1RZqVLtQIdRzd1dSpfGPKbYcxg9h7Yf7XPQ/uWbIebiCq9vgWMnxh9D1mbJptaZvty4x5uR0L9kLP6rqJ0BfOtNYaXyEo5d3PHlEOZsx4xv0a+GW3R3IZlXSqW3GwIMAN8GHsP9qs1SAAAAAElFTkSuQmCC" alt="">
      {{/if}}
      {{if status|notequals>SCANED}}
        <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABQAAAAUCAYAAACNiR0NAAABhUlEQVQ4T82UPU4CQRiG3w8Wg42liaHABAUOYPQAxiPAqlgQAbWg00YPoI12FCpgKERcOILxABoPACiJFMTE0kYiy47ZUZTdnUE3sXC6+X6efD/vDMF2GrHYPCNPBoQlMAS4m9ABwxUxIx+p1W7tOcN3GlzuE4kJo9c/ZmAroxOo4vF5t2bL5RdRHAeasP6bfg3C3HCQPxTi126rZc1luPOOKYsiKAc24ssX9so8fj9mzooc9LCegtHtWqAEqkSql6v2KulzZjcOh6IgXD7n5mZiDUzXHR0SMxbsM6V6XM0DSIvmETo94ebWxqZsrIVoVctYllJX1UcwBEUZwYN9bm7v7omBhHZU06atwLjaA6CIMgI729zcOTySVahHq5rv18DJZJLHPpdKLoAjWh4Phznotdl01bJ0KVIdfuOdS5HJhuuwWPjQYSrt0KFpF8rGdIiEDSJMZbMc+JTLAYxZ2pYK24ySPT3ZJvDT0xtA/+xzGK7kz74vaXsuHV//ocs8afj/B74DpOasFZz5GvwAAAAASUVORK5CYII=" style=" margin-bottom: -3px;" alt="">
      {{/if}}
    {{text}}
    </span></script><script type="text/template" id="tooltip"><div class="tooltip {{status}}">
    <div>
      <span class="arraw"></span>
      <div class="content">
        <p>{{statusText}}</p>
        <ul class="list-unstyled">
        {{virus }}
          <li class="{{status}}">
            <table >
              <tr>
                <td class="logo">
                  <img src="{{logo}}" alt="">
                </td>
                <td class="type">
                  {{name}}
                </td>
                <td  class="text-result">
                  {{statusText}}
                </td>
              </tr>
            </table>
          </li>
        {{/virus}}
        </ul>
      </div>
    </div>
  </div></script><script type="text/template" id="header"><header itemscope itemtype="http://schema.org/SoftwareApplication" {{if app.is_ad_app }} class="ad-app" {{/if}}>
      <span style="display:none;" itemprop="description">{{app.desc}}</span>
      <span style="display:none;" itemprop="url">{{full_short}}</span>
      <span style="display:none;" itemprop="operatingSystem">{{app.type}}</span>
      <span style="display:none;" itemprop="name">{{app.name}}</span>

      <div class="table-container">
        <div class="cell-container">
          <div class="app-brief">
            <div class="icon-container wrapper">
              <i class="icon-icon_path bg-path"></i>
              <span class="icon">
                <img src="{{app.icon_url}}" itemprop="image">
              </span>
              <span class="qrcode">
              </span>
            </div>
            {{if is_ios}}
            <p class="release-type wrapper">{{app.master|release_type}}</p>
            {{else}}
            <p class="release-type wrapper">&nbsp;</p>
            {{/if}}
            <h1 class="name wrapper">
              <span class="icon-warp">
                {{if show_app_type_icon}}<i class="icon-{{app.type}}"></i>{{/if}}
                {{app.name|chop>20}}
              </span>

            </h1>
            <p class="scan-tips">{{SCAN_TIPS}}</p>
            <div class="release-info">
              <p>{{if app.master|release_type|notempty}}{{app.master|release_type}} -
                {{/if}}<span itemprop="softwareVersion">{{app.master.version}} (Build {{app.master.build}})
                - {{app.master.fsize|bytes}}</span></p>
              <p>{{UPDATED_AT}}: <span itemprop="datePublished">{{app.master.created_at|formatDate}}</span></p>
            </div>
            {{if download_visible}}
              <div id="actions" class="actions type-{{app.type}}">
                <button onclick="FIR.install()">{{DOWNLOAD_INSTALL}}</button>
              </div>
            {{/if}}
            {{if app.constraint}}
              <div class="actions">
                到达每日下载上限，请联系开发者
              </div>
            {{/if}}
            {{if show_matching_tips}}
              <div class="platform-matching-tips">
                {{PLATFORM_NOT_MATCHING}}
              </div>
            {{/if}}
          </div>
        </div>
      </div>
    </header></script><script type="text/template" id="desc">{{if app.desc}}
    <div class="desc-section section">
      <h2>{{DESC}}</h2>
      <pre>{{app.desc}}</pre>
    </div>
    {{/if}}</script><script type="text/template" id="app">{{header}}

    {{if app.market_app_info.url}}
    <div class="store-section section">
      <a class='store-link' href="{{app.market_app_info.url}}" onclick="return FIR.collectStore()" target="_blank">
        <i class="icon-{{app.type}}_store"></i>
      </a>
    </div>
    {{/if}}

    {{if app.master.changelog}}
    <div class="master-section section">
      <h2 class="title">{{CHANGELOG}}</h2>
      <pre>{{app.master.changelog}}</pre>
    </div>
    {{/if}}

    <!-- Release list -->
    {{if release_id|empty}}
    {{if app.releases.history}}
    <div class="releases-section section type">
      <h2>{{RELEASES}}</h2>
      {{app.releases.history}}
      {{if #|last}}
      <div class="release-view last">
      {{else}}
      <div class="release-view">
      {{/if}}
        <div class="qrcode">
          <i class="icon-qrcode"></i>
          <div class="popup">
            <div class="inner release-qrcode" data-release="{{id}}">
            </div>
          </div>
        </div>
        <div class="download-btn" onclick="FIR.install('{{id}}')">
          <i></i>
        </div>

        <div class="version-info">
          <p class='version'><b>{{version}} (Build {{build}})</b></p>
          <div class="extra-info">
            <p class=""><i class="icon-calendar"></i>
              <span>{{FILE_SIZE}}: {{fsize|bytes}}</span></p>
            <p class=""> <i class="icon-apple"></i>
              <span>{{UPDATED_AT}}: {{created_at|formatDate}}</span></p>
            {{if changelog|notempty}}<span class="changelog-toggle">{{CHANGELOG}}</span>{{/if}}
          </div>
          <div class="changelog"><pre class="wrapper">{{changelog}}</pre></div>
        </div>
      </div>
      {{/app.releases.history}}

      {{if app.histories|more>3}}
      <div class="more">
        <a class="releases-toggle">
          <span class='off'>{{VIEW_ALL_APP_RELEASES}}</span>
          <span class='on'>{{FOLDING}}</span>
        </a>
      </div>
      {{/if}}
    </div>
    {{/if}}
    {{/if}}

    {{desc}}


    {{if app.screenshots}}
    <div class="screenshots-section section">
      <h2>{{SCREENSHOTS}}</h2>
      <div class="list-wrapper">
        <ul>
          {{app.screenshots}}
          <li><img src="{{.}}"></li>
          {{/app.screenshots}}
        </ul>
      </div>
    </div>
    {{/if}}

    {{footer}}</script><script type="text/template" id="combo">{{header}}

    <div class="per-type-info section">
      <!-- iOS -->
      <div class="type" data-app-type="ios">
        <div class="info">
          <p class='type-icon'><i class="icon-ios"></i></p>
          <p class="version">
            {{CURRENT_VERSION}}: {{ios.master.version}} (Build {{ios.master.build}})&nbsp;
            {{FILE_SIZE}}: {{ios.master.fsize|bytes}}&nbsp; <br>
            {{UPDATED_AT}}: {{ios.master.created_at|formatDate}}
          </p>

          {{if ios.market_app_info.url}}
          <p class="store-link">
            <div class="store-link-wrapper">
              <a href="{{ios.market_app_info.url}}" onclick="FIR.collectStore('{{ios.short}}')" target="_blank">
                <i class="icon-ios_store"></i>
              </a>
            </div>
          </p>
          {{/if}}


        </div>

        {{if ios.master.changelog}}
        <div class="master-section section">
          <h2 class="title">{{CHANGELOG}}</h2>
          <pre>{{ios.master.changelog}}</pre>
        </div>
        {{/if}}

        {{if ios.histories}}
        <div class="releases-section">
          <h2>{{RELEASES}}</h2>

          {{ios.histories}}
          <div class="release-view">
            <div class="qrcode">
              <i class="icon-qrcode"></i>
              <div class="popup">
                <div class="inner release-qrcode" data-release="{{id}}">
                </div>
              </div>
            </div>

            <div class="version-info">
              <p class='version'><b>{{version}} (Build {{build}})</b></p>
              <div class="extra-info">
                <p class="">{{FILE_SIZE}}: {{fsize|bytes}}</p>
                <p class="">{{UPDATED_AT}}: {{created_at|formatDate}}</p>
                {{if changelog|notempty}}<span class="changelog-toggle">{{CHANGELOG}}</span>{{/if}}
              </div>
              <div class="changelog"><pre class="wrapper">{{changelog}}</pre></div>
            </div>
          </div>
          {{/ios.histories}}

          {{if ios.histories|more>3}}
          <div class="more">
            <a class="releases-toggle">
              <span class='off'>{{VIEW_ALL_APP_RELEASES_IOS}}</span>
              <span class='on'>{{FOLDING}}</span>
            </a>
          </div>
          {{/if}}
        </div>
        {{/if}}
      </div>

      <!-- Android -->
      <div class="type" data-app-type="android">
        <div class="info">
          <p class='type-icon'><i class="icon-android"></i></p>
          <p class="version">
            {{CURRENT_VERSION}}: {{android.master.version}} (Build {{android.master.build}})&nbsp;
            {{FILE_SIZE}}: {{android.master.fsize|bytes}}&nbsp; <br>
            {{UPDATED_AT}}: {{android.master.created_at|formatDate}}
          </p>

          {{if android.market_app_info.url}}
          <p class="store-link">
            <div class="store-link-wrapper">
              <a href="{{android.market_app_info.url}}" onclick="FIR.collectStore('{{android.short}}')" target="_blank">
                <i class="icon-android_store"></i>
              </a>
            </div>
          </p>
          {{/if}}
        </div>

        {{if android.master.changelog}}
        <div class="master-section section">
          <h2 class="title">{{CHANGELOG}}</h2>
          <pre>{{android.master.changelog}}</pre>
        </div>
        {{/if}}

        {{if android.histories}}
        <div class="releases-section">
          <h2>{{RELEASES}}</h2>

          {{android.histories}}
          <div class="release-view">
            <div class="qrcode">
              <i class="icon-qrcode"></i>
              <div class="popup">
                <div class="inner release-qrcode" data-release="{{id}}">
                </div>
              </div>
            </div>

            <div class="version-info">
              <p class='version'><b>{{version}} (Build {{build}})</b></p>
              <div class="extra-info">
                <p class="">{{FILE_SIZE}}: {{fsize|bytes}}</p>
                <p class="">{{UPDATED_AT}}: {{created_at|formatDate}}</p>
                {{if changelog|notempty}}<span class="changelog-toggle">{{CHANGELOG}}</span>{{/if}}
              </div>
              <div class="changelog"><pre class="wrapper">{{changelog}}</pre></div>
            </div>
          </div>
          {{/android.histories}}

          {{if android.histories|more>3}}
          <div class="more">
            <a class="releases-toggle">
              <span class='off'>{{VIEW_ALL_APP_RELEASES_ANDROID}}</span>
              <span class='on'>{{FOLDING}}</span>
            </a>
          </div>
          {{/if}}
        </div>
        {{/if}}
      </div>
    </div>

    {{desc}}

    {{if total_screenshots}}
    <div class='combo-screenshots-container'>
      <div class="screenshots-section section">
        {{if ios.screenshots}}
        <h2>iOS {{SCREENSHOTS}}</h2>
        <div class="list-wrapper">
          <ul>
            {{ios.screenshots}}
            <li><img src="{{.}}"></li>
            {{/ios.screenshots}}
          </ul>
        </div>
        {{else}}
        <h2>Android {{SCREENSHOTS}}</h2>
        <div class="list-wrapper">
          <ul>
            {{android.screenshots}}
            <li><img src="{{.}}"></li>
            {{/android.screenshots}}
          </ul>
        </div>
        {{/if}}
      </div>

    </div>
    {{/if}}

    {{footer}}</script><script type="text/template" id="footer"><div class="footer">{{FOOTER_SLOGAN}}</div></script><script type="text/template" id="report-template"><div class="one-key-report-dialog" id="reportDialog" style="display:none;">
      <div class="dialog-close">
        <i class="icon-close"></i>
        <a class="icon-return">&lt;&nbsp;{{REPORT_RETUEN}}</a>
      </div>

      <div class="report-form" id="report-form">

        <div class="report-error" id="report-error">
          <div class="email-error">{{REPORT_EMAIL_ERROR}}</div>
          <div class="type-error">{{REPORT_REASON_ERROR}}</div>
          <div class="message-error">{{REPORT_CONTENT_ERROR}}</div>
        </div>

        <div class="content-row">
          <label >{{REPORT_EMAIL}}</label>
          <input type="text" placeholder="{{REPORT_EMAIL_PLACEHOLDER}}" id="report-email"/>
        </div>

        <div class="content-row">
          <label>{{REPORT_REASON}}</label>
          <div class="checkbox-list" id="report-type">
            <div class="custom-checkbox">{{REPORT_DB}}</div>
            <div class="custom-checkbox">{{REPORT_HS}}</div>
            <div class="custom-checkbox">{{REPORT_QZ}}</div>
            <div class="custom-checkbox">{{REPORT_OTHER}}</div>
          </div>
        </div>

        <div class="content-row">
          <textarea id="report-content" placeholder="{{REPORT_CONTENT_PLACEHOLDER}}"></textarea>
        </div>

        <div class="content-row dialog-action">
          <a href="javascript:;" class="btn btn-report">{{REPORT_BUTTON}}</a>
        </div>
      </div>

      <div class="report-feedback" id="report-feedback">
        <div class="feedback-thanks">
          <div class="brace-content">
            <i class="icon-brace-left"></i>
            <span class="face">
              <i class="icon-comma-eye left"></i>
              <i class="icon-comma-eye right"></i>
              <i class="icon-mouth"></i>
            </span>
            <i class="icon-brace-right"></i>
          </div>
          <p class="thanks">Thanks</p>
        </div>
        <div class="feedback-message">{{REPORT_THANKS}}</div>
        <div class="feedback-content">{{REPORT_MESSAGE}}</div>
      </div>

      <div class="report-sending" id="report-sending">{{REPORT_SENDING}}</div>

    </div></script><script type="text/template" id="bottom-popularize"><div class="bottom-popularize">
      {{html}}
    </div></script><script type="text/template" id="after-install"><div class="after-install-fixed">
      <div class="text-center after-install-header">
        <span class="icon">
          <img src="{{app.icon_url}}" itemprop="image">
        </span>
        <h3 class="waiting">正在下载<span class="waiting-dot"></span></h3>
        <div class='name'>{{app.name|chop>20}}</div>
        <div>{{installText}}</div>
      </div>
      {{list}}
    </div></script><script type="text/template" id="after-install-games"><div class="after-install-games-fixed">
      <div class="text-center after-install-header">
        <span class="icon">
          <img src="{{app.icon_url}}" itemprop="image">
        </span>
        <h3 class="waiting">正在下载<span class="waiting-dot"></span></h3>
        <div class='name'>{{app.name|chop>20}}</div>
      </div>
      {{list}}
    </div></script><script type="text/template" id="after-install-zhibo"><div class="after-install-zhibo-fixed">
      <div class="text-center after-install-header">
        <span class="icon">
          <img src="{{app.icon_url}}" itemprop="image">
        </span>
        <div class="appInfo">
          <div class="primary-text">{{app.name}}</div>
          <div class="info-text">{{installText}}</div>
        </div>
        <h3 class="Downloading">
          <i class="icon-Downloading"></i>
          下载中
        </h3>
      </div>
      {{list}}
    </div></script><script type="text/template" id="popularize-apps-zhibo"><div class='popularize'>
      <div class='popularize-header'>
        或许，你也喜欢以下应用？
      </div>
      <ul class="popularize-list">
        {{apps}}
        <li class='popularize-app-zhibo'>
          <div class="secondary-text">
            {{description|chop>30}}
          </div>
          <div class="popularize-app-zhibo-content">
            <a href="{{install_url}}" target="_blank"  onclick="FIR.clickPopularize({{#}})">
              <img class="samLazyImg" src="http://a.tbcdn.cn/mw/webapp/fav/img/grey.gif"  data-img="{{image_url}}">
            </a>
          </div>
          <div class="app-zhibo">
            <div class="app-zhibo-icon">
              <div class="primary-text">{{title}}</div>
            </div>
            <div class="app-download">
              <a href="{{install_url}}" target="_blank" class="download"
                 onclick="FIR.clickPopularize({{#}})">
                <i class="icon-download"></i>
                <span>下载</span>
              </a>
            </div>
          </div>
        </li>
        {{/apps}}
      </ul>
    </div></script><script type="text/template" id="popularize-apps-games"><div class='popularize-games'>
      <div class='popularize-header'>
        精品推荐
      </div>
      <ul class="popularize-list">
        {{apps}}
        <li class='popularize-app-game'>
          <a href="{{install_url}}" target="_blank" onclick="FIR.clickPopularize({{#}})">
            <div class="popularize-app-game-content">
              <div class="app-zhibo-icon-img">
                <img src="{{icon}}"/>
              </div>
              <div class="primary-text">{{title}}</div>
              <div class="secondary-text">
                {{description|chop>30}}
              </div>
            </div>
            <div class="app-download">
              <i class="icon-download"></i>
            </div>
          </a>
        </li>
        {{/apps}}
      </ul>
    </div></script><script type="text/template" id="popularize-apps"><div class='popularize'>
      <div class='popularize-header'>
        {{if constraint}}
        <h4>想额外获得下载次数？</h4>
        <p>请选择一款你感兴趣的应用下载并注册</p>
        {{else}}
          <span>
          或许，你也喜欢以下应用？
          </span>
          {{if showChange}}
            <span class="refresh" id="refresh" onclick="FIR.renderAdList()">
              <i class="icon-refresh"></i>
              <span>换一换</span>
            </span>
          {{/if}}
        {{/if}}
      </div>
      <ul class="popularize-list">
        {{apps}}
        <li class='popularize-app'>
          <div class="app-icon">
            <img src="{{icon}}" />
          </div>
          {{if isDownload}}
            <div class="popularize-content">
              <div class="popularize-content-title">
                正在下载{{title}}
              </div>
              <div class="popularize-content-download">
                <span>注册后,请刷新页面获取额外下载次数，</span>
                <span>注册检测稍有延迟，请等待</span>
              </div>
            </div>
          {{else}}
            <div class="popularize-content">
              <div class="primary-text">{{title}}</div>
              <div class="secondary-text">{{description|chop>30}}</div>
            </div>
            <div class="popularize-actions">
              <a href="{{install_url}}" target="_blank" class="download"
                 onclick="FIR.clickPopularize({{#}})">
                <i class="icon-download"></i>
              </a>
            </div>
          {{/if}}
        </li>
        {{/apps}}
      </ul>
    </div></script><script type="text/template" id="popularize-app-detail"><div class='popularize'>
      <div class="popularize-app-detail">
        <div class='popularize-header'>
          或许，你也喜欢这个应用？
        </div>
        <div class='popularize-app'>
          <div class="app-icon">
            <img src="{{app.icon}}" />
          </div>
          <div class="popularize-content">
            <div class="primary-text">{{app.title}}</div>
            <div class="secondary-text">{{app.description|chop>30}}</div>
          </div>
        </div>
        <div class="popularize-actions">
          <a href="{{app.install_url}}" target="_blank" class="download download-block" onclick="FIR.clickPopularize(0)">
            <i class="icon-download" /> 下载
          </a>
        </div>
      </div>
    </div></script><script type="text/javascript">!function(a,b,c,d){var e=b.createElement("script");e.type="text/javascript",e.crossOrigin="anonymous",e.src=c,m=b.getElementsByTagName("script")[0],d&&(e.async=!0),m.parentNode.insertBefore(e,m),a.bughd=function(){(a.bughd.q=a.bughd.q||[]).push(arguments)}}(window,document,"//dn-bughd-web.qbox.me/bughd.min.js",!1);
    bughd("create",{key:"eebd236c8c6e9f815ff9822102c2ecd7"})</script><script>(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','//dn-firweb.qbox.me/analytics.js','ga');
      ga('create', 'UA-43616652-5', 'auto');</script><script>var _hmt = _hmt || [];
  (function() {
    var hm = document.createElement("script");
    hm.src = "https://hm.baidu.com/hm.js?11417a0de2093ccfc6a808f3fbf8113a";
    var s = document.getElementsByTagName("script")[0];
    s.parentNode.insertBefore(hm, s);
  })();
  _hmt.push(['_setAutoPageview', false]);</script><script src="/lib/zepto.js"></script><script src="/lib/qrcode.js"></script><script src="/lib/markup.js"></script><script src="/assets/javascripts/bb5d42b0.download.js"></script><script src="/assets/javascripts/2bfd51d6.task.js"></script></body></html>