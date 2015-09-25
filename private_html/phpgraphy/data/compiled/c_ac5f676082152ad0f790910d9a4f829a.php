

<div><span class="title"><?php echo $this->_vars['page_title']; ?>
</span>&nbsp;
    <a href="<?php echo $this->_vars['page_uri']."?".$this->_vars['mode']; ?>
&rss=1"><img src="base/images/rss2.gif" alt="RSS Feed" class="icon"></a>
</div>
<table border="0">
    <?php if (count((array)$this->_vars['pictures'])): foreach ((array)$this->_vars['pictures'] as $this->_vars['picture']): ?>
    <tr><td>
        <?php if ($this->_vars['mode'] == "toprated"): ?>
        <span class="small"><?php echo $this->_vars['picture']['place']; ?>
.</span>
        <?php endif; ?>
        <a href="?display=<?php echo $this->_vars['picture']['picurl']; ?>
" title="<?php echo $this->_vars['picture']['pictitle']; ?>
">
        <img src="?previewpic=<?php echo $this->_vars['picture']['picurl']; ?>
" alt="<?php echo $this->_vars['picture']['pictitle']; ?>
" class="thumbnail" />
        </a>
    </td>
    <td>

        <?php if ($this->_vars['mode'] == "lastcommented"): ?>
        <span class="small"><?php echo $this->_vars['picture']['datetime']; ?>
 <?php echo $this->_vars['txt_comment_by']; ?>
 <b><?php echo $this->_vars['picture']['by']; ?>
</b></span>
        <br />
        <?php endif; ?>

        <a href="?display=<?php echo $this->_vars['picture']['picurl']; ?>
"><?php echo $this->_vars['picture']['pictitle']; ?>
</a>

        <?php if ($this->_vars['mode'] == "toprated"): ?>
        <span class="small"> - <?php echo $this->_vars['picture']['X_with_X_votes']; ?>
</span>
        <?php elseif ($this->_vars['mode'] == "lastaddedpictures"): ?>
        <div class="small"><?php echo $this->_vars['picture']['datetime']; ?>
</div>
        <?php endif; ?>

    </td></tr>
    <?php endforeach; endif; ?>
</table>

<?php if ($this->_vars['prev'] <= $this->_vars['nb_of_pictures']): ?>
<a href="?<?php echo $this->_vars['page_from']; ?>
=<?php echo $this->_vars['dir_url']; ?>
&from=<?php echo $this->_vars['prev']; ?>
"><?php echo $this->_vars['txt_previous_page']; ?>
</a> &nbsp;
<?php endif; ?>

<?php if ($this->_vars['next'] >= 0): ?>
<a href="?<?php echo $this->_vars['page_from']; ?>
=<?php echo $this->_vars['dir_url']; ?>
&from=<?php echo $this->_vars['next']; ?>
"><?php echo $this->_vars['txt_next_page']; ?>
</a>
<?php endif; ?>
<br />
<div class="small"><a href="?dir=<?php echo $this->_vars['dir_url']; ?>
"><?php echo $this->_vars['txt_go_back']; ?>
</a></div>
