<?php
/*---------------------------------------------------------------------------


 

 Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )

 

 Support: https://git.oschina.net/smeoa/smeoa
 -------------------------------------------------------------------------*/

class CustomerAction extends CommonAction {
	protected $config = array('app_type' => 'common', 'action_auth' => array('set_tag' => 'admin', 'tag_manage' => 'admin'));

	//过滤查询字段
	function _search_filter(&$map) {
		$map['user_id'] = array('eq', get_user_id());
		$map['is_del'] = array('eq', '0');
		if (!empty($_POST['tag'])) {
			$map['tag'] = $_POST['tag'];
		}
		if (!empty($_POST['keyword'])) {
			$keyword = $_POST['keyword'];
			$where['name'] = array('like', "%" . $keyword . "%");
			$where['office_tel'] = array('like', "%" . $keyword . "%");
			$where['office_tel'] = array('like', "%" . $keyword . "%");
			$where['_logic'] = 'or';
			$map['_complex'] = $where;
		}
	}

	function index() {
         $fid = $_REQUEST["fid"];
		$model = M("Customer");
		$where['is_del'] = 0;
        if ($fid == 1) { 
            $where['credit'] = 1;
            $this -> select='信用正常';
        }else if ($fid == 11) {
            $where['credit'] = 2;
            $this -> select='信用次级';
        }else if ($fid == 2) {
            $where['credit'] = 3;
            $this -> select='信用瑕疵';
        }else if ($fid == 3) {
            $where['credit'] = 4;
            $this -> select='禁入';
        }else if ($fid == 4) {
            $where['trade'] = '金融和保险';
            $this -> select='金融和保险';
        }else if ($fid == 5) {
            $where['trade'] = '房地产';
            $this -> select='房地产';
        }else if ($fid == 6) {
            $where['trade'] = '建筑建材';
            $this -> select='建筑建材';
        }
        // else if ($fid == 7) {
   //          $where['trade'] = '建筑建材';
   //          $this -> select='建筑建材';
   //      }
        else if ($fid == 8) {
            $where['money'] = array(array('gt',10000),array('lt',100000)) ;
            $this -> select='1万〜10万';
        }else if ($fid == 9) {
            $where['money'] = array(array('gt',100000),array('lt',1000000)) ;
            $this -> select='10万〜100万';
        }else if ($fid == 10) {
            $where['money'] = array(array('gt',1000000),array('lt',10000000)) ;
            $this -> select='100万〜1000万';
        }else if ($fid == 11) {
            $where['money'] = array(array('gt',10000000),array('lt',1000000000000)) ;
            $this -> select='1000万以上';
        }
        
     
        
        
        
		$list = $model -> where($where) -> select();
		$this -> assign('list', $list);
		$tag_data = D("SystemTag") -> get_data_list();
		
		$new = array();
		foreach ($tag_data as $val) {
			$new[$val['row_id']] = $new[$val['row_id']] . $val['tag_id'] . ",";
		}
		$this -> assign('tag_data', $new);
		$this -> _assign_tag_list();
		$this -> display();
		return;
	}

	function export() {
		$model = M("Customer");
		$where['is_del']=0;
		$list = $model -> where($where) -> select();

		Vendor('Excel.PHPExcel');
		//导入thinkphp第三方类库

		$inputFileName ="Public/templete/customer.xlsx";
		$objPHPExcel = PHPExcel_IOFactory::load($inputFileName);

		$objPHPExcel -> getProperties() -> setCreator("smeoa") -> setLastModifiedBy("smeoa") -> setTitle("Office 2007 XLSX Test Document") -> setSubject("Office 2007 XLSX Test Document") -> setDescription("Test document for Office 2007 XLSX, generated using PHP classes.") -> setKeywords("office 2007 openxml php") -> setCategory("Test result file");
		// Add some data
		$i = 1;
		//dump($list);
		foreach ($list as $val) {
			$i++;
			$objPHPExcel -> setActiveSheetIndex(0) -> setCellValue("A$i", $val["name"]) -> setCellValue("B$i", $val["short"]) -> setCellValue("C$i", $val["biz_license"]) -> setCellValue("D$i", $val["payment"]) -> setCellValue("E$i", $val["address"]) -> setCellValue("F$i", $val["salesman"]) -> setCellValue("G$i", $val["contact"]) -> setCellValue("H$i", $val["email"]) -> setCellValue("I$i", $val["office_tel"]) -> setCellValue("J$i", $val["mobile_tel"]) -> setCellValue("J$i", $val["fax"]) -> setCellValue("L$i", $val["im"]) -> setCellValue("M$i", $val["remark"]);
		}
		// Rename worksheet
		$objPHPExcel -> getActiveSheet() -> setTitle('Customer');

		// Set active sheet index to the first sheet, so Excel opens this as the first sheet
		$objPHPExcel -> setActiveSheetIndex(0);
	
		$file_name="customer.xlsx";
		// Redirect output to a client’s web browser (Excel2007)
		header("Content-Type: application/force-download");
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header("Content-Disposition:attachment;filename =" . str_ireplace('+', '%20', URLEncode($file_name)));
		header('Cache-Control: max-age=0');

		$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
		$objWriter -> save('php://output');
		exit ;
	}

	public function import() {
		$save_path = get_save_path();
		$opmode = $_POST["opmode"];
		if ($opmode == "import") {
			import("@.ORG.Util.UploadFile");
			$upload = new UploadFile();
			$upload -> savePath = $save_path;
			$upload -> allowExts = array('xlsx');
			$upload -> saveRule = uniqid;
			$upload -> autoSub = false;

			if (!$upload -> upload()) {
				$this -> error($upload -> getErrorMsg());
			} else {
				//取得成功上传的文件信息
				$uploadList = $upload -> getUploadFileInfo();
				Vendor('Excel.PHPExcel');
				//导入thinkphp第三方类库

				$inputFileName = $save_path . $uploadList[0]["savename"];
				$objPHPExcel = PHPExcel_IOFactory::load($inputFileName);
				$sheetData = $objPHPExcel -> getActiveSheet() -> toArray(null, true, true, true);
				$model = M("Customer");
				for ($i = 2; $i <= count($sheetData); $i++) {
					$data = array();
					$data['name'] = $sheetData[$i]["A"];
					$data['short'] = $sheetData[$i]["B"];
					$data['letter'] = get_letter($sheetData[$i]["A"]);
					$data['biz_license'] = $sheetData[$i]["C"];
					$data['payment'] = $sheetData[$i]["D"];
					$data['address'] = $sheetData[$i]["E"];
					$data['salesman'] = $sheetData[$i]["F"];
					$data['contact'] = $sheetData[$i]["G"];
					$data['email'] = $sheetData[$i]["H"];
					$data['office_tel'] = $sheetData[$i]["I"];
					$data['mobile_tel'] = $sheetData[$i]["J"];
					$data['fax'] = $sheetData[$i]["K"];
					$data['im'] = $sheetData[$i]["L"];
					$data['remark'] = $sheetData[$i]["M"];
					$data['is_del'] = 0;
					$model -> add($data);
				}
				//dump($sheetData);
				if (file_exists($_SERVER["DOCUMENT_ROOT"] . "/" . $inputFileName)) {
					unlink($_SERVER["DOCUMENT_ROOT"] . "/" . $inputFileName);
				}
				$this -> assign('jumpUrl', get_return_url());
				$this -> success('导入成功！');
			}
		} else {
			$this -> display();
		}
	}

	function edit() {
        $id = $_REQUEST["id"];
        $daiid = $_REQUEST["dai"];
        $Customer = M("Customer"); 
        if ( $daiid !='') { //是否来自贷款流程图  
            $find = $Customer->where('dai='.$daiid)->find();  
    		if (empty($find)) {  //无则新建
                $this -> success( '前往添加表!',"index.php?m=customer&a=add&dai=$daiid");
             }
             else{
                 $id = $find['id']; 
             }
           
        }
        $this->vo = $Customer->where('id='.$id)->find();
        
        
         
        
	    $this -> display();
	}
	function add() {
		$daiid = $_REQUEST["dai"];
        $this -> dai = $daiid;
        if ($daiid != '') {
    		$model = D("Flow"); //通过daiid 和 type 找到flow_id
    		//$id = $_REQUEST['id'];
    		$where['dai'] = array('eq', $daiid);
            $where['type'] = array('eq', 45);
    		$where['_logic'] = 'and';
    		$map['_complex'] = $where;
    		$vo = $model -> where($map) -> find();
            $flowid  = $vo['id'];
            $this -> flowid  = $vo['id'];
            // $this -> success('操作成功!');
        	$flow = D("flow_field_data");
         	$name = $flow ->where('field_id = 166 AND flow_id='.$flowid ) -> find();//.$flowid
            $customer =  $name['val'];
            $this ->customer =  $name['val'];
         	$name = $flow ->where('field_id = 168 AND flow_id='.$flowid ) -> find();//.$flowid
            $tel =  $name['val'];
            $this ->tel =  $name['val'];
         	$name = $flow ->where('field_id = 173 AND flow_id='.$flowid ) -> find();//.$flowid
            $money =  $name['val'];
            $this ->money =  $name['val'];
         	$name = $flow ->where('field_id = 180 AND flow_id='.$flowid ) -> find();//.$flowid
            $biz_license =  $name['val'];
            $this ->biz_license =  $name['val'];
                    //
              //           $Form    =    M("Customer");// 1  创建一个新贷款记录  $daiId =   时间
            //             $Form  -> user_id = get_user_id(); //信贷员id
            //             $Form  -> user_name = get_user_name(); //信贷员
            //             $Form  -> customer = $customer;
            //             $Form  -> tel = $tel;
            //             $Form  -> money = $money;
            //             $Form  -> biz_license = $biz_license;
            //             $Form  -> aply_time = mktime();//时间
            //             $Form  -> dai = $daiid;
            //
            // //保存当前数据对象
            // $list = $Form -> add();
            // if ($list !== false) {//保存成功
            //     $this -> assign('jumpUrl', get_return_url());
            //     $this -> success('新增成功!');
            // } else {
            //     //失败提示
            //     $this -> error('新增失败!');
            // }
        }
		
        $this -> display();
	}

	function mark() {
		$id = $_REQUEST["id"];
		$val = $_REQUEST["val"];
		$field = 'group';
		$result = $this -> _set_field($id, $field, $val);
		if ($result !== false) {
			$this -> assign('jumpUrl', get_return_url());
			$this -> success('操作成功!');
		} else {
			//失败提示
			$this -> error('操作失败!');
		}
	}

	function del(){
		$id = $_POST['id'];
		$count = $this ->_del($id,null,true);

		if ($count) {
			$model = D("SystemTag");
			$result = $model -> del_data_by_row($id);
		}

		if ($count !== false) {//保存成功
			$this -> assign('jumpUrl', get_return_url());
			$this -> success("成功删除{$count}条!");
		} else {
			//失败提示
			$this -> error('删除失败!');
		}
	}

	function set_tag(){
		$id=	$_POST['id'];
		$tag=$_POST['tag'];
		$new_tag=$_POST['new_tag'];
		if (!empty($id)){
			$model = D("SystemTag");
			$model -> del_data_by_row($id);
			if (!empty($_POST['tag'])) {
				$result = $model -> set_tag($id,$tag);
			}
		};

		if (!empty($new_tag)) {
			$model = D("SystemTag");
			$model -> module = MODULE_NAME;
			$model -> name = $new_tag;
			$model -> is_del = 0;
			$model -> user_id = get_user_id();
			$new_tag_id = $model -> add();
			if (!empty($id)){				
				$result = $model -> set_tag($id,$new_tag_id);
			}
		};
		if ($result !== false) {//保存成功
			if ($ajax || $this -> isAjax())
				$this -> assign('jumpUrl', get_return_url());
			$this -> success('操作成功!');
		} else {
			//失败提示
			$this -> error('操作失败!');
		}
	}
	
	function tag_manage() {
		$this -> _tag_manage("分组管理");
	}

	protected function _insert(){	
        $daiid = $_POST['dai'];	
		$model = D('Customer');
		if (false === $model -> create()) {
			$this -> error($model -> getError());
		}
		$model ->letter=get_letter($model ->name);
		//保存当前数据对象
		$list = $model -> add();
		if ($list !== false) {//保存成功
            if ($daiid != '') {
    			$this -> success('新增成功1!',"index.php?m=customer&a=edit&id=$list");
            }
		    // $this -> assign('jumpUrl', get_return_url());
    //         $this -> success('新增成功!');
    $this -> success('新增成功2!','index.php?m=customer&a=edit&id='.$list);
		} else {
			//失败提示
			$this -> error('新增失败!');
		}
	}

	protected function _update() {
		$id = $_POST['id'];
		$model = D("Customer");
		if (false === $model -> create()) {
			$this -> error($model -> getError());
		}
		$model ->letter=get_letter($model ->name);

		// 更新数据
		$list = $model -> save();
		if (false !== $list) {
			//成功提示
			$this -> assign('jumpUrl', get_return_url());
			$this -> success('编辑成功!');
		} else {
			//错误提示
			$this -> error('编辑失败!');
		}
	}

	protected function _assign_tag_list() {
		$model = D("SystemTag");
		$tag_list = $model -> get_tag_list('id,name');
		$this -> assign("tag_list", $tag_list);
	}

}
?>