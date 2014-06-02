{include file='common/header.tpl'}

{include file='common/topbar.tpl'}
<link href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" rel="stylesheet">
<link href="{$BASE_URL}css/jquery.pagedown-bootstrap.css" rel="stylesheet">
<script type="text/javascript" src="{$BASE_URL}javascript/jquery.pagedown-bootstrap.combined.min.js"></script>
<script type="text/javascript" src="{$BASE_URL}javascript/questions/add_tag.js"></script>


<div id="help-div" class="well" style="display:none">
  <ul class="nav nav-tabs" id="help">
    <li class="active"><a href="#links" data-toggle="tab">Links</a></li>
    <li><a href="#images" data-toggle="tab">Images</a></li>
    <li><a href="#styles" data-toggle="tab">Styles</a></li>
    <li><a href="#lists" data-toggle="tab">Lists</a></li>
    <li><a href="#quotes" data-toggle="tab">Quotes</a></li>
    <li><a href="#code" data-toggle="tab">Code</a></li>
    <li><a href="#html" data-toggle="tab">HTML</a></li>
  </ul>

  <div class="tab-content">
    <div class="tab-pane fade in active" id="links">
      <br>
      In most cases, a plain URL will be recognized as such and automatically linked: <br>
      <br>
      <kbd>
        Visit http://area51.stackexchange.com/ regularly!<br>
        Use angle brackets to force linking: Have you seen &lt;http://superuser.com&gt;?<br>
      </kbd>
      <br>
      To create fancier links, use Markdown:<br>
      <br>
      <kbd>
        Here's [a link](http://www.example.com/)! And a reference-style link to [a panda][1].<br>
        References don't have to be [numbers][question].<br>
        
        [1]: http://notfound.stackexchange.com/<br>
        [question]: http://english.stackexchange.com/questions/11481<br>
      </kbd>
      <br>
      You can add tooltips to links:<br>
      <br>
      <kbd>
        Click [here](http://diy.stackexchange.com "this text appears when you mouse over")!<br>
        This works with [reference links][blog] as well.<br>
        <br>
        [blog]: http://blog.stackoverflow.com/ "click here for updates"<br>
      </kbd>
    </div>


    <div class="tab-pane fade" id="images">
      <br>
      Images are exactly like links, but they have an exclamation point in front of them:<br>
      <br>
      <kbd>
        ![a busy cat](http://sstatic.net/stackoverflow/img/error-lolcat-problemz.jpg)<br>
        ![two muppets][1]<br>
        [1]: http://i.imgur.com/I5DFV.jpg "tooltip"<br>
      </kbd>
      <br>
      The word in square brackets is the alt text, which gets displayed if the browser can't show the image. Be sure to include meaningful alt text for screen-reading software.<br>
    </div>

    <div class="tab-pane fade" id="styles">
      <br>
      Be sure to use text styling sparingly; only where it helps readability.<br>
      <br>
      <kbd>
        *This is italicized*, and so<br>
        is _this_.<br>

        **This is bold**, just like __this__.<br>

        You can ***combine*** them<br>
        if you ___really have to___.<br>
      </kbd>
      <br>
      To break your text into sections, you can use headers:<br>
      <br>
      <kbd>
        A Large Header<br>
        ==============<br>

        Smaller Subheader<br>
        -----------------<br>
      </kbd>
      <br>
      Use hash marks if you need several levels of headers:<br>
      <br>
      <kbd>
        # Header 1 #<br>
        ## Header 2 ##<br>
        ### Header 3 ###<br>
      </kbd>
    </div>

    <div class="tab-pane fade" id="lists">
      <br>
      Both bulleted and numbered lists are possible:<br>
      <br>

      <kbd>
        - Use a minus sign for a bullet<br>
        + Or plus sign<br>
        * Or an asterisk<br>
        <br>
        1. Numbered lists are easy<br>
        2. Markdown keeps track of<br>
        the numbers for you<br>
        7. So this will be item 3.<br>
        <br>
        1. Lists in a list item:<br>
        &emsp; - Indented four spaces.<br>
        &emsp;&emsp;&emsp;* indented eight spaces.<br>
        &emsp; - Four spaces again.<br>
        2.  You can have multiple<br>
        &emsp;&emsp;&emsp;paragraphs in a list items.<br>
      </kbd>
      <br>
      Just be sure to indent.<br>
      
    </div>

    <div class="tab-pane fade" id="quotes">
      <br>
      <kbd>
        > Create a blockquote by<br>
        > prepending “>” to each line.<br>
        ><br>
        > Other formatting also works here, e.g.<br>
        ><br>
        > 1. Lists or<br>
        > 2. Headings:<br>
        ><br>
        > ## Quoted Heading ##<br>
      </kbd>
      <br>
      You can even put blockquotes in blockquotes:<br>
      <br>
      <kbd>
        > A standard blockquote is indented<br>
        > > A nested blockquote is indented more<br>
        > > > > You can nest to any depth.<br>
      </kbd>

    </div>

    <div class="tab-pane fade" id="code">
      <br>
      To create code blocks or other preformatted text, indent by four spaces:<br>
      <br>
      <kbd>
        &nbsp;&nbsp;&nbsp;&nbsp;This will be displayed in a monospaced font. The first four spaces<br>
        &nbsp;&nbsp;&nbsp;&nbsp;will be stripped off, but all other whitespace will be preserved.<br>
        <br>
        &nbsp;&nbsp;&nbsp;&nbsp;Markdown and HTML are turned off in code blocks:<br>
        &nbsp;&nbsp;&nbsp;&nbsp;&lt;i&gt;This is not italic&lt;/i&gt;, and [this is not a link](http://example.com)<br>
      </kbd>
      <br>
      To create not a block, but an inline code span, use backticks:<br>
      <br>
      <kbd>
        The `$` character is just a shortcut for `window.jQuery`.<br>
      </kbd>
      <br>
      If you want to have a preformatted block within a list, indent by eight spaces:<br>
      <br>
      <kbd>
        1.This is normal text.<br>
        2.So is this, but now follows a code block:<br>
        <br>
        &nbsp;&nbsp;&nbsp;&nbsp;Skip a line and indent eight spaces.<br>
        &nbsp;&nbsp;&nbsp;&nbsp;That's four spaces for the list<br>
        &nbsp;&nbsp;&nbsp;&nbsp;and four to trigger the code block.<br>
      </kbd>
    </div>


    <div class="tab-pane fade" id="html">
      <br>
      Subset of allowed HTML tags:<br>
      <br>
      <kbd>
        &lt;a&gt;              - hyperlink.<br />
        &lt;b&gt;              - bold, use as last resort &lt;h1&gt;-&lt;h3&gt;, &lt;em&gt;, and &lt;strong&gt; are preferred.<br />
        &lt;blockquote&gt;     - specifies a section that is quoted from another source.<br />
        &lt;code&gt;           - defines a piece of computer code.<br />
        &lt;del&gt;            - delete, used to indicate modifications.<br />
        &lt;dd&gt;             - describes the item in a &lt;dl&gt; description list.<br />
        &lt;dl&gt;             - description list.<br />
        &lt;dt&gt;             - title of an item in a &lt;dl&gt; description list.<br />
        &lt;em&gt;             - emphasized.<br />
        &lt;h1&gt;, &lt;h2&gt;, &lt;h3&gt; - headings.<br />
        &lt;i&gt;              - italic.<br />
        &lt;img&gt;            - specifies an image tag.<br />
        &lt;kbd&gt;            - shows keyboard input.<br />
        &lt;li&gt;             - list item in an ordered list &lt;ol&gt; or an unordered list &lt;ul&gt;.<br />
        &lt;ol&gt;             - ordered list.<br />
        &lt;p&gt;              - paragraph.<br />
        &lt;pre&gt;            - pre-element displayed in a fixed width font and and unchanged line breaks.<br />
        &lt;s&gt;              - strikethrough.<br />
        &lt;sup&gt;            - superscript text appears 1/2 character above the baseline used for footnotes and other formatting.<br />
        &lt;sub&gt;            - subscript appears 1/2 character below the baseline.<br />
        &lt;strong&gt;         - defines important text.<br />
        &lt;strike&gt;         - strikethrough is deprecated, use &lt;del&gt; instead.<br />
        &lt;ul&gt;             - unordered list.<br />
        &lt;br&gt;             - line break.<br />
        &lt;hr&gt;             - defines a thematic change in the content, usually via a horizontal line.<br />
      </kbd>

    </div>


  </div>
</div>


<form action="{$BASE_URL}actions/questions/new_question.php" method="post" enctype="multipart/form-data">
	<div class="container" style="margin-left:15% ;margin-right:31.4%; width:60%">
    <b>Title</b>
    <input type="text" name="title" class="form-control" id="title" value="{$FORM_VALUES.title}">
  </div>

  <br><br>

  <div class="container" style="margin-left:15% ;margin-right:31.4%; width:60%">
    <textarea class="form-control" id="pagedownMe" rows="10" id="body" name="body" value="{$FORM_VALUES.body}"></textarea>
  </div>



  <br><br>

  <div class="container" style="margin-left:15% ;margin-right:31.4%; width:60%">
    <b>Tags</b> <small class="pull-right">Check the existent tags in the <a href="{$BASE_URL}pages/tags/list_all.php"> Tags</a> section.</small>

    <div class="dropdown">
      <input type="text" data-toggle="dropdown" class="form-control tag" style="width:30%; height:30px; margin-bottom:4px" id="tag1" name="tags[]" value="{$FORM_VALUES.tags[0]}">
      <ul class="dropdown-menu tags-menu" role="menu" aria-labelledby="query"></ul>         
    </div>
    <div class="dropdown">
      <input type="text" data-toggle="dropdown" class="form-control tag" style="width:30%; height:30px; margin-bottom:4px" id="tag2" name="tags[]" value="{$FORM_VALUES.tags[1]}">
      <ul class="dropdown-menu tags-menu" role="menu" aria-labelledby="query"></ul>
    </div>
    <div class="dropdown">
      <input type="text" data-toggle="dropdown" class="form-control tag" style="width:30%; height:30px; margin-bottom:4px" id="tag3" name="tags[]" value="{$FORM_VALUES.tags[2]}">
      <ul class="dropdown-menu tags-menu" role="menu" aria-labelledby="query"></ul>
    </div>
    <div class="dropdown">
      <input type="text" data-toggle="dropdown" class="form-control tag" style="width:30%; height:30px; margin-bottom:4px" id="tag4" name="tags[]" value="{$FORM_VALUES.tags[3]}">
      <ul class="dropdown-menu tags-menu" role="menu" aria-labelledby="query"></ul>
    </div>
    <div class="dropdown">
      <input type="text" data-toggle="dropdown" class="form-control tag" style="width:30%; height:30px; margin-bottom:4px" id="tag5" name="tags[]" value="{$FORM_VALUES.tags[4]}">
      <ul class="dropdown-menu tags-menu" role="menu" aria-labelledby="query"></ul>
    </div>
    <small>Minimum tags:1 | Maximum tags:5</small>
  </div>

  <div class="container" style="margin-left:15% ;margin-right:31.4%; width:60%">
    <button type="submit" class="btn btn-default btn-info pull-right" id="post-question" style="margin-top:10px">Post Question</button>
  </div>
</form>
<br><br>
<br><br>

<script type="text/javascript">
(function () {
  {literal}
  $("textarea#pagedownMe").pagedownBootstrap(
  {
    'help': function(event){event.preventDefault(); $('#help-div').is(":visible") ? $('#help-div').fadeOut(500) : $('#help-div').fadeIn(500); }
  });
  {/literal}
  $('.wmd-preview').addClass('well');

})();



$('#help a').click(function(e){
  e.preventDefault();
  $(this).tab('show');
});

$("#help-div").appendTo("#wmd-button-bar-0");
</script> 

{include file='common/footer.tpl'}