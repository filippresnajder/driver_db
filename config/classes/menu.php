<?php
class Menu {
    private $menu;

    public function __construct($menu) {
        $this->menu = $menu;
    }

    public function generateLeftMenuPart() {
        $menuItems = ''; 
            
        foreach($this->menu as $page_name => $page_url){
            $menuItems .= '<li class="nav-item"><a class="nav-link" href="' . $page_url . '">' . $page_name . '</a></li>';
        }
    
        return $menuItems;
    }

    public function generateRightMenuPart() {
        $menuItems = ''; 
            
        if(isset($_SESSION['id'])) {
            $user = new User();
            $data = $user->getUserData($_SESSION['username']);
            $role = $data['role'];

            foreach($this->menu as $page_name => $page_url){
                if($page_name == "Login" || $page_name == "Register" || ($role == 0 && $page_name == "Admin panel")) continue;
                $menuItems .= '<li class="nav-item"><a class="nav-link" href="' . $page_url . '">' . $page_name . '</a></li>';
            }
            return $menuItems;
        } else {
            foreach($this->menu as $page_name => $page_url){
                if($page_name == "Login" || $page_name == "Register") {
                    $menuItems .= '<li class="nav-item"><a class="nav-link" href="' . $page_url . '">' . $page_name . '</a></li>';
                }
            }
            return $menuItems;  
        }
    
    }
}
?>