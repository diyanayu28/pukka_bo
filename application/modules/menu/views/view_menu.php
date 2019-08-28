<?php
foreach($this->menu as $data_menu){
    if($data_menu->menuStyle == 'parent'){
    ?>
        <li class="px-nav-item px-nav-dropdown">
            <a href="#"><i class="px-nav-icon ion-ios-<?php echo $data_menu->iconMenu?>" style="color:<?php echo $data_menu->menuColor?>"></i><span class="px-nav-label"> <?php echo $data_menu->menuName;?></span></a>
            <ul class="px-nav-dropdown-menu">
            <?php
                $sub = $this->m_login->get_sub_menu($this->session_group, $data_menu->menuId);
                foreach($sub as $data_sub){
                    if($data_sub->menuStyle == 'sub'){
                    ?>
                        <li class="px-nav-item">
                            <a class="load" href="<?php echo site_url($data_sub->page.'/'.$data_sub->subPage);?>">
                                <span class="px-nav-label"><?php echo $data_sub->menuName;?></span>
                            </a>
                        </li>
                    <?php
                    }
                }
            ?>
            </ul>
        </li>
    <?php
    }elseif($data_menu->menuStyle == 'single'){
?>
<li class="px-nav-item">
    <a class="load" href="<?php echo site_url($data_menu->page.'/'.$data_menu->subPage);?>">
        <i class="px-nav-icon ion-ios-<?php echo $data_menu->iconMenu?>"></i>
        <span class="px-nav-label"><?php echo $data_menu->menuName;?></span>
    </a>
</li>
<?php 
    }
}
?>