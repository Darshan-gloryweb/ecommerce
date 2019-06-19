<?php
/***
		Author : Glorywebs PVT LTD.
		Url : www.glorywebs.com
		Created By : Manish Prajapati
		Careted On : 03-12-2013
		Decription : This is the Function File.
***/


function getTopNav($id,$menu,$frontpath)  //Top Menu navigation
			{

    global $dbLink;
				$sql="select * from navigation where parent=".$id." and menuid=".$menu." order by displayorder desc";
				$res=mysqli_query($dbLink,$sql) or die ('Could Not Select');
				if(mysqli_num_rows($res)>0)
				{
					?> <ul> <?php
					while($d=$res->fetch_assoc())
					{
						?>
            			<li><a href="<?=$frontpath?>/<?=$d['slug']?>" class="<?php if(substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1)==$d['slug'] ) { echo "sel"; } ?>" title="<?=$d['title']?>"><?=$d['title']?></a>
                        <?php
						getTopNav($d['id'],$menu,$frontpath);
						?> </li><?php
					}
					?></ul><?php
				}
			}
			
			
function getFooterNav($id,$menu)   // Footer Menu navigation
			{
				    global $dbLink;
				$sql="select * from navigation where parent=".$id." and menuid=".$menu." order by displayorder";
				$res=mysqli_query($dbLink,$sql) or die ('Could Not Select');
				if(mysqli_num_rows($res)>0)
				{
					while($d=$res->fetch_assoc())
					{
						?>
            			<a href="<?=$frontpath?>/<?=$d['slug']?>" title="<?=$d['title']?>"><?=$d['title']?></a><span>|</span>
                        <?php
						getFooterNav($d['id'],$menu);
					}
				}
			}

?>