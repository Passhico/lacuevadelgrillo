



<div id="dirbarleft">
    <?php echo $this->_vars['nav_path']; ?>

    <?php if ($this->_vars['nb_dirs']): ?> - <?php echo $this->_vars['nb_dirs'];  endif; ?>
    <?php if ($this->_vars['nb_files']): ?> - <?php echo $this->_vars['nb_files'];  endif; ?>
</div>
<div id="dirbarright">
    <?php if (count((array)$this->_vars['navbar_menu'])): foreach ((array)$this->_vars['navbar_menu'] as $this->_vars['menu_entry']): ?>
    <?php echo $this->_vars['menu_entry']; ?>

    <?php endforeach; endif; ?>
</div>
