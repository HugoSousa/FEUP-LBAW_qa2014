    <div style="text-align:center">
      <ul class="pagination">
        {if $page == 1}
        <li class="disabled">
        {else}
        <li>
        {/if}
        <a href="#">&laquo;</a></li>

        {if $page >= 3}
          {if $page-2 > 1}
            <li><a href="#">1</a></li>
            <li class="disabled">...</li>
          {/if}
          {for $page_=$page-2 to $page+2}
            {if $page_ <= $pages }
            <li><a href="#">{$page_}</a></li>
            {/if}
           {/for}
           {if $page+2 < $pages}
            <li class="disabled">...</li>
            <li><a href="#">$pages</a></li>
           {/if}
        
        {else}
          {for $page_=$page to $page+4}
            {if $page_ <= $pages  }
            <li><a href="#">{$page_}</a></li>
            {/if}
          {/for}

          {if $page+4 < $pages}
            <li class="disabled">...</li>
            <li><a href="#">$pages</a></li>
           {/if}
        {/if}


        {if $page == $pages}
        <li class="disabled">
        {else}
        <li>
        {/if}
        <a href="#">&raquo;</a></li>
      </ul>
    </div>