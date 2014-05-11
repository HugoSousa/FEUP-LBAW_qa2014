    <div style="text-align:center">
      <ul class="pagination">
        {if $page == 1}
        <li class="disabled">
        {else}
        <li>
        {/if}
        <a href="{$BASE_URL}{$destination}?page={$page - 1}">&laquo;</a></li>

        {if $page >= 3}
          {if $page-2 > 1}
            <li><a href="{$BASE_URL}{$destination}?page=1">1</a></li>
            <li class="disabled"><a>...</a></li>
          {/if}
          {for $page_=$page-2 to $page+2}
            {if $page_ <= $pages }
            <li><a href="{$BASE_URL}{$destination}?page={$page_}" >{$page_}</a></li>
            {/if}
           {/for}
           {if $page+2 < $pages}
            <li class="disabled"><a>...</a></li>
            <li><a href="{$BASE_URL}{$destination}?page={$pages}">{$pages}</a></li>
           {/if}
        
        {else}
          {for $page_=$page to $page+4}
            {if $page_ <= $pages  }
            <li><a href="{$BASE_URL}{$destination}?page={$page_}">{$page_}</a></li>
            {/if}
          {/for}

          {if $page+4 < $pages}
            <li class="disabled"><a>...</a></li>
            <li><a href="{$BASE_URL}{$destination}?page={$pages}">{$pages}</a></li>
           {/if}
        {/if}


        {if $page == $pages}
        <li class="disabled">
        {else}
        <li>
        {/if}
        <a href="{$BASE_URL}{$destination}?page={$page + 1}">&raquo;</a></li>
      </ul>
    </div>