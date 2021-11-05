Vue.component('mainmenu', {
    data:function(){
    },
    updated: function(){
    },
    methods: {
        RedirectToCategoryPage: function(category_id){
            window.location.href=this.$root.ApiURL+"/category.php?type_id=0&category_id="+category_id;
        },
    },
    template: `<ul class="exo-menu" style="padding-left:200px;">
            <li  v-for="(menuname, inc) in $root.menulist" :class="[menuname.sub_category.length > 0 ? 'drop-down': '']">
                <a href="javascript:void(0)">  {{menuname.name}} <span v-if="menuname.sub_category.length != 0" style="color: #ffffff" class="arrow_carrot-down"></span></a>
                <ul v-if="menuname.sub_category.length != 0" class="drop-down-ul animated fadeIn">
                    <li class="flyout-right" v-for="subname in menuname.sub_category">
                        <a href="javascript:void(0)" @click="$root.RedirectToDeatilPage(subname.enc_subcat_id, 0)">{{subname.name}}</a>
                    </li>
                </ul>
            </li>
            <!--li><a href="contact.php?type_id=0&category_id=N0hkU0FIVDB2T3NNSEc5d0pWbWl0dz09">Contact Us</a></li-->
        </ul>`
    });

Vue.component('logincomp', {
    data:function(){
        return {
            ErrorStatus: 0,
            response_msg: '',
            res_status: 0,
        }
    },
    updated: function(){
    },
    methods: {
        SubmitLoginUser: function(){
            var validation      = 0;
            var email       = $("#login_email").val();
            var password        = $("#login_password").val();
            if($.trim(email) == "") {
                $("#login_email").attr("placeholder", "Email ID is required.");
                $("#login_email").css("border-color", "red");
                validation = 1;
            } else {    
                $("#login_email").attr("placeholder", "");  
                $("#login_email").css("border-color", ""); } 
            
            if($.trim(password) == "") {
                $("#login_password").attr("placeholder", "Password is required.");
                $("#login_password").css("border-color", "red");
                validation = 1;
            } else {    
                $("#login_password").attr("placeholder", ""); 
                $("#login_password").css("border-color", "");
            } 

            if(validation == 0){
                $('#preloder, .loader').css('display', 'block');
                const formData = new FormData(this.$refs['loginform']); 
                const data = {}; 
                for (let [key, val] of formData.entries()) {
                    Object.assign(data, { [key]: val })
                }
                axios.post(this.$root.ApiURL+'/login_action.php', data).then((response)  =>  {
                    console.log(data);
                    $('#preloder, .loader').css('display', 'none');
                    if(response.data == 1) {
                        location.reload();
                    } else {
                        this.ErrorStatus = 1;
                        this.response_msg = "Enter Valid Login Details";
                    }
                }, (error)  =>  {
                    console.log(error);
                })
            }
            return false;
        },
        CloseErrorMsg: function(){
            this.ErrorStatus = 0;
        }
    },
    template: `
    <section class="loginmodel">
        <div data-popup="1" style="width: 360px;">
            <div class="login-box-body">
                <div class="login_cover">
                    <div class="inner_log_cover">
                        <div class="login-logo" style="background: #000000;padding:10px 0px 0px 10px">
                             <p style="padding-bottom: 10px;color:#ffffff;">LOGIN
                                <span data-pop style="float: right;padding-right: 10px;font-size: 35px; cursor: pointer;">&times;</span></p>
                        </div>
                        <form action="#" method="post" id="IdFrmLogin" ref="loginform" @submit.prevent="SubmitLoginUser" style="padding: 0px 30px 20px 20px;">
                            <div class="form-group has-feedback">
                                <label style="font-weight:400;font-size: 14px;">Email ID</label>
                                <input type="text" name="email" id="login_email" placeholder="Enter Email ID" tabindex=1 autofocus="true" style="height: 40px; width: 100%;font-size: 16px;" >
                                <span class="glyphicon glyphicon-envelope form-control-feedback" style="top: 28px; font-size: 14px;"></span>
                                <span class="error EmailErr"></span>
                            </div>
                            <div class="form-group has-feedback">
                                <label style="font-weight:400;font-size: 14px;">Password</label>
                                <input type="password" name="password" id="login_password" placeholder="Enter Password" tabindex=2 style="height: 40px; width: 100%;font-size: 16px;" >
                                <span class="glyphicon glyphicon-lock form-control-feedback" style="top: 28px; font-size: 14px;"></span>
                                <span class="error PassErr"></span>
                            </div>
                            <div class="row">
                                <div class="col-xs-12">
                                    <div class="col-xs-7" style="padding-left: 0px;padding-top: 8px;font-size: 16px;">
                                        <a style="color:#000000;" href="signup.php?type_id=0&category_id=N0hkU0FIVDB2T3NNSEc5d0pWbWl0dz09">New Customer?</a>
                                    </div>
                                    <div class="col-xs-5" style="padding-right: 0px;">
                                        <input type="hidden" name="NameUserLogin"   > 
                                        <button type="submit" id="IdSubmitLogin" class="site-btn btn btn-block" tabindex=3>Sign In</button>
                                    </div>
                                </div>
                            </div>
                        </form> 
                        <div class="row pt-3" v-if="ErrorStatus == 1">
                            <div class="col-lg-12 p-4"  style="background: #f8d7da;border: 1px solid #f8d7da;">
                                <div class="breadcrumb__text" style="font-size: 20px;">
                                    <strong style="color:#721c24">Error!</strong> 
                                    {{response_msg}}
                                    <button type="button" class="close" data-dismiss="alert" @click="CloseErrorMsg()" style="font-size: 20px;">&times;</button>
                                </div>           
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>`
});

/*Vue.component('mainsearchbar', {
    data:function(){
    },
    updated: function(){
    },
    method: {
    },
    template: `<form action="#">
        <div class="hero__search__categories">
            <select name="category" class="form-control display-all-category">
                <option> All Categories</option>
                <option v-for="category in $root.categorylist_data">{{category.name}}</option>
            </select>
        </div>
        <input type="text" placeholder="Search here products..." id="MainSearchText">
        <button type="submit" class="site-btn" >SEARCH</button>
    </form>`
});*/

Vue.component('headercomp', {
    data:function(){
    },
    updated: function(){
    },
    method: {
        
    },
    template: `<fragment><div class="header__top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-5 col-md-5">
                        <div class="header__top__left">
                            <ul>
                                <li><i class="fa fa-envelope"></i> info@stronggym.com</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-7 col-md-7">
                        <div class="header__top__right">
                            <div class="header__top__right__language">
                                <i class="fa fa-user"></i>
                                <div v-if="$root.UserId == 0 "> My Account</div>
                                <div v-else> {{$root.UserName }}</div>
                                <span style="color: #ffffff" class="arrow_carrot-down"></span>
                                <ul>
                                    <li v-if="$root.UserId == 0"><i class="fa fa-shopping-basket"></i><a href="#" data-pop="1" >Orders</a></li>
                                    <li v-if="$root.UserId != 0" ><i class="fa fa-user-circle"></i><a :href="$root.ApiURL+'/profile.php?callfrom=1&profile=xMGowMVRtZy9mU1pDVlpuSjkzUG9xMGowMVRtZy9mU1pDUT09xMGowMVRtZy9mU1pD&user_id=VlpuSjkzUG9xMGowMVRtZy9mU1pDUT09'">My Profile</a></li>
                                    <li v-if="$root.UserId != 0" ><i class="fa fa-shopping-basket"></i><a :href="$root.ApiURL+'/profile.php?callfrom=2&orders=puSjkzUG9xMGowtZy9mU1pDVlMVRtZy9mU1pDUT09xMGowMVRtZy9mU1pD&user_id=VlpuSjkzUG9xMGowMVRtZy9mU1pDUT09'">Orders</a></li>
                                    <li v-if="$root.UserId == 0"><i class="fa fa-heart-o"></i><a href="#" data-pop="1" >Wishlist</a></li>
                                    <li v-if="$root.UserId != 0" ><i class="fa fa-heart-o"></i><a :href="$root.ApiURL+'/wishlist.php?&wishlist=puSjkzUG9xMGowtZy9mU1pDVlMVRtZy9mU1pDUT09xMGowMVRtZy9mU1pD&user_id=VlpuSjkzUG9xMGowMVRtZy9mU1pDUT09'">Wishlist</a></li>
                                    <li><i class="fa fa-user-o"></i><a href="#">Your Seller Account</a></li>
                                    <li><i class="fa fa-address-card-o"></i><a href="#">Become an Affiliate</a></li>
                                    <li v-if="$root.UserId != 0 "><i class="fa fa-power-off"></i><a :href="$root.ApiURL+'/logout.php'">Logout</a></li>

                                </ul>
                            </div>
                            <div class="header__top__right__language">
                                <a style="color: #ffffff;" href="javascript:void(0)" ><i class="fa fa-map-marker"></i> Track Order</a>
                            </div>
                            <div class="header__top__right__language">

                                <div> English</div>
                                <span style="color: #ffffff" class="arrow_carrot-down"></span>
                                <ul style="width:120px;">
                                    <li><a href="#">English</a></li>
                                    <li><a href="#">Arabic</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container" id="myHeader">
            <div class="row">

                <div class="col-lg-2">
                    <div class="header__logo">
                        <a :href="$root.ApiURL">
                            <img :src="$root.ApiURL+'/assets/img/logo.png'" alt="">
                        </a>
                        <div class="header__cart mobile_view_cart">
                        <ul><!-- Mobile view shooping cart-->
                            <li v-if="$root.UserId == 0"><a href="javascript:void(0)"  data-pop="1" class="ClsHideMobileMenu" ><i class="fa fa-user-plus" style="color: #000000 !important;"></i></a></li>
                            <li><a :href="$root.ApiURL+'/cart.php'"><i class="fa fa-shopping-bag" style="color: #000000 !important;"></i> <span v-if="$root.shoppingcart != '' ">{{$root.shoppingcart.CartCount}}</span> <span v-else>0</span></a></li>
                        </ul>
                    </div>
                    </div>

                </div>
                <div class="humberger__open">
                    <i class="fa fa-bars" style="color: #000000 !important"></i>
                </div>
                <div class="col-lg-8 header_search_bar">
                    <div class="hero__search">
                        <div class="hero__search__form">
                            <form action="#">
                                <div class="hero__search__categories">
                                    <select name="category" class="form-control display-all-category">
                                        <option> All Categories</option>
                                        <option v-for="category in $root.categorylist_data">{{category.name}}</option>
                                    </select>
                                </div>
                                <input type="text" placeholder="Search here products..." id="MainSearchText">
                                <button type="submit" class="site-btn" >SEARCH</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 cart_icon_total_amount">
                    <div class="header__cart blog__item__text">
                        <ul>
                            <li><div class="header__cart__price blog__btn pointer" v-if="$root.UserId == 0 "><span data-pop="1"><i class="fa fa-user-plus"></i> Login</span></div></li>
                            <li><a id="HedaerCartLink" href="javascript:void(0);" data-toggle="collapse" data-target="#ViewCart" @click="$root.GetCartDetails()" ><i class="fa fa-shopping-bag" style="color: #000000 !important;"></i> <span v-if="$root.shoppingcart != '' ">{{$root.shoppingcart.CartCount}}</span> <span v-else>0</span></a></li>
                        </ul>

                        <div class="cart float-right">
                            <div  class="HedaerCartCollapse items-list mt-4 collapse" id="ViewCart" >
                                <span v-if="$root.HeaderCartData.length > 0 ">
                                <div class="item" v-for="cartdata in $root.HeaderCartData">
                                    <div class="row">
                                        <div class="col-3">
                                            <div class="item-pic">
                                                <a :href="strongApp.ApiURL+'/details.php?type_id=0&category_id='+cartdata.enc_productdetail_id"><img :src="$root.ApiURL+'/admin/product/'+cartdata.product_image" class="img-fluid" alt="product" /></a>
                                            </div>
                                        </div>
                                        <div class="col-9 pl-0">
                                            <div class="item-name text-left">{{$root.textTrimDesc(cartdata.name,25)}}</div>
                                            <div class="item-price text-left" >{{cartdata.quantity}} x KD{{cartdata.sales_price}}</div>
                                            <div class="item-remove" @click="$root.RemoveProduct(cartdata.cart_id)"><i class="fa fa-trash" style="color:red !important;"aria-hidden="true"></i></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <p style="text-align:center;">Subtotal: KD{{$root.shoppingcart.TotalAmount}} </p>
                                </div>
                                <div class="row">
                                    <div class="blog__item__text">
                                        <span class="blog__btn pointer" style="background: #ea2323;" data-toggle="collapse" data-target="#ViewCart">Close</span>
                                        <a :href="$root.ApiURL+'/cart.php'" class="blog__btn ml-5">View Cart</a>
                                    </div>
                                </div>
                                </span>
                                <span v-else >
                                    <div class="item">
                                        <p style="text-align:center;">No products in the cart.</p>
                                        <div class="blog__item__text">
                                            <span class="blog__btn pointer" style="background: #ea2323;" data-toggle="collapse" data-target="#ViewCart">Close</span>
                                        </div>
                                    </div>
                                </span>
                            </div>
                        </div>

                        <div class="header__cart__price" v-if="$root.UserId != 0 ">Your Cart: <br><span v-if="$root.shoppingcart != '' && $root.shoppingcart.CartCount != 0 "  style="color: #000000;"> KD{{$root.shoppingcart.TotalAmount}}</span> <span v-else  style="color: #000000;">KD0.00</span></div>
                    </div>
                </div>
            </div>
        </div>
    </fragment>`
});


var strongApp = new Vue({
    el: '#MainMenuSection',
    props: {
        userdetailid: Number,
        userdetailname: String,
        userdetaillname: String,
    },
    data() {
	    return {
            UserId: 0,
            UserName:'',
            LastName:'',
            UserEmail:'',
            UserMobile:'',
            menulist: [],
            shoppingcart:'',
            categorylist_data:[],
            HeaderCartData:[],
            AddedCart: 0,
            //ApiURL: 'http://localhost/strong',
            ApiURL: 'http://strong.meforyou.info',
	    }
    },
    updated: function(){
        this.$nextTick(() => {
        })
    },
    methods: {
        GetCategoryList: function () {
            axios.get(this.ApiURL+'/admin/Categories/GetCategory.json').then((res)  =>  {
                this.categorylist_data = res.data.response;
            }, (error)  =>  {
                console.log(error);
            })
        },
        GetMenuList: function () {
            axios.get(this.ApiURL+'/admin/ListCategories/GetMenuList.json').then((res)  =>  {
                this.menulist = res.data.response;
            }, (error)  =>  {
                console.log(error);
            })
        },
        GetCartTotal: function (id) {
            axios.get(this.ApiURL+'/admin/CustomerCarts/GetCartTotal/'+id+'.json').then((res)  =>  {
                this.shoppingcart = res.data.response;
            }, (error)  =>  {
                console.log(error);
            })
        },
        DetectDevice(){
            !function(a){var b=/iPhone/i,c=/iPod/i,d=/iPad/i,e=/(?=.*\bAndroid\b)(?=.*\bMobile\b)/i,f=/Android/i,g=/(?=.*\bAndroid\b)(?=.*\bSD4930UR\b)/i,h=/(?=.*\bAndroid\b)(?=.*\b(?:KFOT|KFTT|KFJWI|KFJWA|KFSOWI|KFTHWI|KFTHWA|KFAPWI|KFAPWA|KFARWI|KFASWI|KFSAWI|KFSAWA)\b)/i,i=/IEMobile/i,j=/(?=.*\bWindows\b)(?=.*\bARM\b)/i,k=/BlackBerry/i,l=/BB10/i,m=/Opera Mini/i,n=/(CriOS|Chrome)(?=.*\bMobile\b)/i,o=/(?=.*\bFirefox\b)(?=.*\bMobile\b)/i,p=new RegExp("(?:Nexus 7|BNTV250|Kindle Fire|Silk|GT-P1000)","i"),q=function(a,b){return a.test(b)},r=function(a){var r=a||navigator.userAgent,s=r.split("[FBAN");return"undefined"!=typeof s[1]&&(r=s[0]),s=r.split("Twitter"),"undefined"!=typeof s[1]&&(r=s[0]),this.apple={phone:q(b,r),ipod:q(c,r),tablet:!q(b,r)&&q(d,r),device:q(b,r)||q(c,r)||q(d,r)},this.amazon={phone:q(g,r),tablet:!q(g,r)&&q(h,r),device:q(g,r)||q(h,r)},this.android={phone:q(g,r)||q(e,r),tablet:!q(g,r)&&!q(e,r)&&(q(h,r)||q(f,r)),device:q(g,r)||q(h,r)||q(e,r)||q(f,r)},this.windows={phone:q(i,r),tablet:q(j,r),device:q(i,r)||q(j,r)},this.other={blackberry:q(k,r),blackberry10:q(l,r),opera:q(m,r),firefox:q(o,r),chrome:q(n,r),device:q(k,r)||q(l,r)||q(m,r)||q(o,r)||q(n,r)},this.seven_inch=q(p,r),this.any=this.apple.device||this.android.device||this.windows.device||this.other.device||this.seven_inch,this.phone=this.apple.phone||this.android.phone||this.windows.phone,this.tablet=this.apple.tablet||this.android.tablet||this.windows.tablet,"undefined"==typeof window?this:void 0},s=function(){var a=new r;return a.Class=r,a};"undefined"!=typeof module&&module.exports&&"undefined"==typeof window?module.exports=r:"undefined"!=typeof module&&module.exports&&"undefined"!=typeof window?module.exports=s():"function"==typeof define&&define.amd?define("isMobile",[],a.isMobile=s()):a.isMobile=s()}(this);
                //alert(this.isMobile.any ? 'Mobile' : 'Not mobile');
                if(this.isMobile.any != true) {
                    this.GetMenuList();
                }
            
        },
        RedirectToDeatilPage: function(category_id, type_id){
            window.location.href=this.ApiURL+"/product.php?type_id="+type_id+"&category_id="+category_id;
        },
        AddToCart: function(product_id, pro_size, qty, color, code, add_type){
            if(this.UserId > 0) {
                $('#preloder, .loader').css('display', 'block');
                var params = { 'customer_id': this.UserId, 'product_detail_id': product_id, 'quantity': qty, 'product_size': pro_size, 'color_name': color, 'color_code':code, 'add_type': add_type };
                axios.post(strongApp.ApiURL+'/api/v1/Addtocart', params).then((res)  =>  {
                    $('#preloder, .loader').css('display', 'none');
                    //console.log(res.data.response)
                    if(res.data.response.status == 200) {
                        this.AddedCart = 1;
                        $('#AddedtoCart'+product_id).css('display', 'block');
                        $('#addcart'+product_id).removeClass('fa-shopping-basket').addClass('fa-check'); 
                        $('#AddtoCart'+product_id).prop('title', 'Added to Cart');
                        this.GetCartDetails();
                        this.GetCartTotal(this.UserId);
                    } else {
                        alert(res.data.response.message);
                    }
                }, (error)  =>  {
                    console.log(error);
                })
            } else {
                //alert('To Add Cart, Please login to continue');
                var n = 1;
                var $popup = n ? $("[data-popup='"+n+"']"): $(this).closest("[data-popup]");
                $popup.slideToggle(240);
            }
        },
        textTrimDesc:function(description, value) {
            var desc = $("<div>").html(description).text();
            return desc.slice(0, value) + (desc.length > value ? "..." : "");
        },
        addWhishlist: function(id) {
            if(this.UserId > 0) {
                $('#preloder, .loader').css('display', 'block');
                var params = { 'customer_id': this.UserId, 'product_detail_id': id, };
                axios.post(strongApp.ApiURL+'/api/v1/Addwishlist', params).then((res)  =>  {
                    if(res.data.response.status == 200) {
                        if($('#wish'+id).hasClass('fa-heart-o')) {
                            $('#wish'+id).addClass('fa-heart').removeClass('fa-heart-o');  
                            $('#wishlist'+id).prop('title', 'Remove from Wishlist');
                        } else {
                            $('#wish'+id).removeClass('fa-heart').addClass('fa-heart-o'); 
                            $('#wishlist'+id).prop('title', 'Add to Wishlist');
                        }
                    }
                    $('#preloder, .loader').css('display', 'none');
                }, (error)  =>  {
                    console.log(error);
                })

            } else {
                //alert('To Add Wishlist, Please login to continue');
                var n = 1;
                var $popup = n ? $("[data-popup='"+n+"']"): $(this).closest("[data-popup]");
                $popup.slideToggle(240);
            }
        },
        GetCartDetails:function() {
            if(this.UserId != 0) {
                this.loader = 1;
                $('#preloder, .loader').css('display', 'block');
                axios.get(this.ApiURL+'/admin/CustomerCarts/GetCartDetails/'+this.UserId+'.json').then((res)  =>  {
                    $('#preloder, .loader').css('display', 'none');
                    this.loader = 0;
                    this.HeaderCartData = res.data.response;
                    $('#HedaerCartLink').removeClass("collapsed");
                    $("#HedaerCartLink").attr("aria-expanded","true");
                    $('.HedaerCartCollapse').addClass("show");
                }, (error)  =>  {
                    console.log(error);
                });
            } else {
                this.HeaderCartData = '';
            }
        },
        RemoveProduct: function(id) {
            var ans = confirm('Are you sure? Do you want to REMOVE from cart?');
            if (ans == true || ans == 1) {
                $('#preloder, .loader').css('display', 'block');
                var params = {'cart_id':id, 'customer_id': this.UserId};
                axios.post(this.ApiURL+'/admin/CustomerCarts/Removefromcart.json', params).then((res)  =>  {
                    $('#preloder, .loader').css('display', 'none');
                    if(res.data.response.status == 200) {
                        this.GetCartDetails();
                        this.GetCartTotal(this.UserId);
                    } else {
                        alert(res.data.response.message);
                    }
                }, (error)  =>  {
                    console.log(error);
                })
            }
        },
    },
    mounted() {
      this.GetMenuList();
      this.GetCategoryList();
      this.UserId = (this.$refs.mainmenulist.$attrs.userdetailsid != '' ? this.$refs.mainmenulist.$attrs.userdetailsid : 0 );
      this.UserName = (this.$refs.mainmenulist.$attrs.userdetailsname != '' ? this.$refs.mainmenulist.$attrs.userdetailsname : 0 );
      this.LastName = (this.$refs.mainmenulist.$attrs.userdetailslname != '' ? this.$refs.mainmenulist.$attrs.userdetailslname : 0 );
      //this.UserEmail = (this.$refs.mainmenulist.$attrs.userdetailsemail != '' ? this.$refs.mainmenulist.$attrs.userdetailsemail : 0 );
      //this.UserMobile = (this.$refs.mainmenulist.$attrs.userdetailsmobile != '' ? this.$refs.mainmenulist.$attrs.userdetailsmobile : 0 );
      if(this.UserId > 0){
        this.GetCartTotal(this.UserId);
      }
    }
})
