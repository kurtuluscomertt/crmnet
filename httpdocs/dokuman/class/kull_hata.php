
<style>
    blockquote{
-webkit-transition: all 500ms ease-out ;
-moz-transition: all 500ms ease-out ;
-o-transition: all 500ms ease-out ;
transition: all 500ms ease-out ;
font:16px 'Open Sans';
padding:15px;
width:300px;
}
blockquote span{font-weight:600;}
blockquote #close{float:right; color:inherit; text-decoration:none;}

blockquote#warning{
    background-color:#bb0101;
    border-left:7px #d61e1e solid;
    color:#fdfdfd;
    }
    </style>

    <blockquote id="warning">
        <a id="close" title="Close"  href="#" onClick="document.getElementById('warning').setAttribute('style','opacity:0; visibility:hidden;');">&times;</a>
        <span>Uyarı!</span> Kullanıcı adı veya şifre hatalı !
        </blockquote>
        
