document.oncontextmenu = function (event) {
 event.preventDefault();
};
var base_config = {
   	
}
//创建菜单
var libramenu ={ 		
   id: null,
   // obj 对象
   goodsobj: null,
   //base.url 
	// 当前是否被选中
   selected: false,
   initialize: function(){
	  this.goodsobj = $('#opmenu1');
   },
   
   refresh: function(obj){
	  if(this.select != true){	  
	    $('#ui_opmenu1').children('li').each(function(){
		    var turl = obj.url +"&workid=" obj.id;
	    	$(this).children('a').attr("href",turl);
	    });
	  }
	  return ;
   },
   
   select: function(obj){
       this.selected = true;
       this.showContextMenu(obj);
       this.goodsobj.show();
       return null;
   },
   // 取消选中
   unselect: function(obj){
       this.selected = false;
       this.goodsobj.hide();
       return null;
   },
   
   showContextMenu: function(obj=null){
       var Topmenu   =  this.goodsobj
	   var rightEdge = document.body.clientWidth - obj.event.clientX;
       var bottomEdge = document.body.clientHeight - obj.event.clientY;
       
       var Temp_left = 0;
       var Temp_top  = 0;
       
       var offset = -5;
       //too width
       if (rightEdge < this.goodsobj[0].offsetWidth)
    	   Temp_left = document.body.scrollLeft + obj.event.clientX - this.goodsobj [0].offsetWidth + offset;
		else
		   Temp_left = document.body.scrollLeft + obj.event.clientX + offset;
        //too heigt 
		if (bottomEdge < this.goodsobj[0].offsetHeight)
			Temp_top = document.body.scrollTop + obj.event.clientY - this.goodsobj[0].offsetHeight + offset;
		else
			Temp_top = document.body.scrollTop + obj.event.clientY + offset;
		
	   Topmenu.css("left", Temp_left).fadeIn(500);
	   Topmenu.css("top", Temp_top).fadeIn(500);
	
   }   
}
var main = document.getElementById('canvas');
var opts ={};
opts.width  = 700;
opts.height  = 500;
//初始化zrender
var zr   = zrender.init(main,opts);

//画板
var librawork = {
   id: null,
   url:null,
   shape: {  
	     x: 200,  
	     y: 0,  
	     width: 100,  
	     height:100,    
	 },  
	style: {  
	      fill: '#ccddff',
	      stroke: '#999999',
	      lineWidth : 2,
	      text : '',
	      textAlign : 'center',
	      fontSize:12,
	},  
	position: [10,10],
	//draggable : true,
	onmouseover : function(params) {
		  zr.addHover(this, {
		         stroke: 'yellow',
		         lineWidth: 4,
		         opacity: 1
		     });
		     zr.refresh();
	},
	onmouseout:function(params) {
		 zr.removeHover(this);
	},
	oncontextmenu:function(params) {
	    libramenu.id = this.id;
	    libramenu.initialize();
	    if(libramenu.selected == false){
	    	libramenu.select(params);
	    }
	    else{
	    	libramenu.unselect(params);
	    }	

	},
}
zr.add(new zrender.Rect(librawork));



 