<!-- <div id="divIntMenu">
<ul id="pMenu">
	{foreach from=$menu item=mn key=k}
	<li class="pMenu"><a class="menu_titulo" href="" rel="{$k}">{$mn.master}</a></li>
	{/foreach}
</ul>
</div> 
<div id="divIntSubMenu">
	{foreach from=$menu item=mn key=k}
		{if $menu[$k]!=''}	
		<ul id="pSubmenu_{$k}" style="display:none">
			{foreach from=$mn item=sbmn key=i}
			{if $i!='master'}
				<li class="pSubmenu"><a href="" rel="{$i}">{$sbmn}</a></li>
			{/if}
			{/foreach}
		</ul>
		{/if}
	{/foreach}
</div> -->

<div id="menu">
 <div id="menubody">
 <ul id="menulist">
 	{foreach from=$menu item=mn key=k}
		<li class="pSubmenu"><a href="" rel="{$k}">{$mn}</a></li>
	{/foreach}
  </ul>
 </div>
</div>