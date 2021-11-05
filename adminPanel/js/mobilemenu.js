
Vue.component('mobilemenulist', {
    data:function(){
    },
    updated: function(){
    },
    methods: {
        ExpandMoileMenu: function(id){
            if($('#mobilemainmenu'+id).hasClass('arrow_carrot-down')){
                $('#mobilemainmenu'+id).removeClass('arrow_carrot-down').addClass('arrow_carrot-up');
                $('#mobilemenuli'+id).css('display', 'block');
            } else {
                $('#mobilemainmenu'+id).removeClass('arrow_carrot-up').addClass('arrow_carrot-down');
                $('#mobilemenuli'+id).css('display', 'none');
            }
        },
    },
    template: `<fragment>
        <div class="humberger__menu__cart">
            <ul>
                <li><a :href="strongApp.ApiURL+'/cart.php'"><i class="fa fa-shopping-bag" style="color: #000000 !important;"></i> <span v-if="strongApp.shoppingcart != '' ">{{strongApp.shoppingcart.CartCount}}</span> <span v-else>0</span></a></li>
            </ul>
            <div class="header__cart__price">Your Cart: <span v-if="strongApp.shoppingcart != '' && strongApp.shoppingcart.CartCount != 0 "> KD{{strongApp.shoppingcart.TotalAmount}}</span> <span v-else>$0.00</span></div>
        </div>
        <div class="humberger__menu__widget">
            <div class="header__top__right__language">
                <i class="fa fa-user" style="color: #000000 !important"></i>  
                <div v-if="strongApp.UserId == 0 "><span style="color: #1c1c1c">  My Account</div>
                <div v-else> <span style="color: #1c1c1c"> {{strongApp.UserName }}</div>
                <span class="arrow_carrot-down"></span>
                <ul>
                    <li v-if="strongApp.UserId == 0"><i class="fa fa-shopping-basket"></i><a href="javascript:void(0);" data-pop="1" class="ClsHideMobileMenu">Orders</a></li>
                    <li v-if="strongApp.UserId != 0" ><i class="fa fa-user-circle"></i><a :href="strongApp.ApiURL+'/profile.php?profile=xMGowMVRtZy9mU1pDVlpuSjkzUG9xMGowMVRtZy9mU1pDUT09xMGowMVRtZy9mU1pD&user_id=VlpuSjkzUG9xMGowMVRtZy9mU1pDUT09'">My Profile</a></li>
                    <li v-if="strongApp.UserId != 0" ><i class="fa fa-shopping-basket"></i><a :href="strongApp.ApiURL+'/profile.php?callfrom=2&orders=puSjkzUG9xMGowtZy9mU1pDVlMVRtZy9mU1pDUT09xMGowMVRtZy9mU1pD&user_id=VlpuSjkzUG9xMGowMVRtZy9mU1pDUT09'">Orders</a></li>
                    <li v-if="strongApp.UserId == 0"><i class="fa fa-heart-o"></i><a href="javascript:void(0);" data-pop="1" class="ClsHideMobileMenu" >Wishlist</a></li>
                    <li v-if="strongApp.UserId != 0" ><i class="fa fa-heart-o"></i><a :href="strongApp.ApiURL+'/wishlist.php?&wishlist=puSjkzUG9xMGowtZy9mU1pDVlMVRtZy9mU1pDUT09xMGowMVRtZy9mU1pD&user_id=VlpuSjkzUG9xMGowMVRtZy9mU1pDUT09'">Wishlist</a></li>
                    <li><i class="fa fa-user-o"></i><a href="#">Your Seller Account</a></li>
                    <li><i class="fa fa-address-card-o"></i><a href="#">Become an Affiliate</a></li>
                    <li v-if="strongApp.UserId != 0 "><i class="fa fa-power-off"></i><a :href="strongApp.ApiURL+'/logout.php'">Logout</a></li>

                </ul>
            </div>
            <div v-if="strongApp.UserId == 0 " class="header__top__right__language">
                <a href="#" data-pop="1" id="IdHideMobileMenu"><i class="fa fa-user-plus" style="color: #000000 !important"></i> <span style="color: #1c1c1c">SignIn / SignUp</span></a>
            </div>
            <div class="header__top__right__language">
                <i class="fa fa-language" style="color: #000000 !important"></i>  
                <div> <span style="color: #1c1c1c"> English</span></div>
                <span class="arrow_carrot-down"></span>
                <ul>
                    <li><a href="#">English</a></li>
                    <li><a href="#">Arabic</a></li>
                </ul>
            </div>
        </div>
        <nav class="humberger__menu__nav mobile-menu" ><ul style="list-style: none;overflow: hidden;padding: 0;">
        <li  class="mobilemenuli" v-for="menuname in strongApp.menulist"><a href="#" class="mobile_mainmenu" @click="ExpandMoileMenu(menuname.catgory_id)">{{menuname.name}} <span v-if="menuname.sub_category.length != 0" :id="'mobilemainmenu'+menuname.catgory_id" class="arrow_carrot-down" style="float:right;font-size: 24px;"></span></a>
            <ul class="header__menu__dropdown" v-if="menuname.sub_category.length != 0" :id="'mobilemenuli'+menuname.catgory_id" style="display:none;">
                <li class="mobilemenuli pointer" v-for="(subname,inc) in menuname.sub_category" @click="strongApp.RedirectToDeatilPage(subname.enc_subcat_id, 0)" style="padding-left: 10px;"><a href="#" style="font-size: 14px;">{{subname.name}}</a>
                </li>
            </ul>
        </li>
        <!--li class="mobilemenuli"><a href="contact.php?type_id=0&category_id=N0hkU0FIVDB2T3NNSEc5d0pWbWl0dz09">Contact Us</a></li-->
        </ul></nav>
    </fragment>`
});


Vue.component('mobileaccountcomp', {
    data:function(){
    },
    updated: function(){
    },
    methods: {
    },
    template: `<fragment><fragment>`
});


var mobilemenuapp = new Vue({
   el: '#MobileMainMenuSection',
    data() {
	    return {
          menumobilelist: [],
	    }
    },    
    methods: {
        GetMobileMenu: function () {
            axios.get(strongApp.ApiURL+'/admin/ListCategories/GetMenuList.json').then((res)  =>  {
                this.menumobilelist = res.data.response;
            }, (error)  =>  {
                console.log(error);
            })
        },
        RedirectToDeatilPage: function(category_id, type_id){
            window.location.href=strongApp.ApiURL+"/product.php?type_id="+type_id+"&category_id="+category_id;
        },
    },
    mounted() {
    }
})
