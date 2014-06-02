    <div style="text-align:center">
      <ul class="pagination">
        {if $page == 1}
        <li class="disabled">
        {else}
        <li>
        {/if}
        {$fields = ''}
        {if (isset($filter_acc) && $filter_acc != 'all')}
          {assign var="fields" value=$fields|cat:'&filter_acc='|cat:$filter_acc}
        {/if}

        {if (isset($filter_ans) && $filter_ans != 'all')}
          {assign var="fields" value=$fields|cat:'&filter_ans='|cat:$filter_ans}
        {/if}

        {if (isset($search) && $search != '')}
          {assign var="fields" value=$fields|cat:'&search='|cat:$search}
        {/if}

        {if (isset($order) && $order != 'reputation' && $order != 'new')}
          {assign var="fields" value=$fields|cat:'&order='|cat:$order}
        {/if}

        {if (isset($idTag))}
          {assign var="fields" value=$fields|cat:'&idTag='|cat:$idTag}
        {/if}

        {if $page == 1}
        <a>&laquo;</a></li>
        {else}
        <a href="{$BASE_URL}{$destination}?page={$page - 1}{$fields}">&laquo;</a></li>
        {/if}
        {if $page >= 3}
          {if $page-2 > 1}
            <li><a href="{$BASE_URL}{$destination}?page=1{$fields}">1</a></li>
            <li class="disabled"><a>...</a></li>
          {/if}
          {for $page_=$page-2 to $page+2}
            {if $page_ <= $pages }
            <li><a href="{$BASE_URL}{$destination}?page={$page_}{$fields}" >{$page_}</a></li>
            {/if}
           {/for}
           {if $page+2 < $pages}
            <li class="disabled"><a>...</a></li>
            <li><a href="{$BASE_URL}{$destination}?page={$pages}{$fields}">{$pages}</a></li>
           {/if}
        
        {else}
          {for $page_=$page to $page+4}
            {if $page_ <= $pages  }
            <li><a href="{$BASE_URL}{$destination}?page={$page_}{$fields}">{$page_}</a></li>
            {/if}
          {/for}

          {if $page+4 < $pages}
            <li class="disabled"><a>...</a></li>
            <li><a href="{$BASE_URL}{$destination}?page={$pages}{$fields}">{$pages}</a></li>
           {/if}
        {/if}


        {if $page == $pages}
        <li class="disabled">
          <a>&raquo;</a>
        </li>
        {else}
        <li>
        <a href="{$BASE_URL}{$destination}?page={$page + 1}{$fields}">&raquo;</a>
        </li>
        {/if}
      </ul>
    </div>