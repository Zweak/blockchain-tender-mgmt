<?php 
	Class Block_chain {

		public function read_data($file)
		{
			$filedata = file_get_contents($file);
			$data = json_decode($filedata);
			return $data;
		}

		public function read_row_data($file,$id)
		{
			$filedata = file_get_contents($file);

			$row = [];
			$result = json_decode($filedata);
			if($result)
			{
				foreach($result as $key => $val)
				{
					if($val->id == $id)
						$row = $val;
				}
			}
			return $row;
		}

		public function add_data($file,$new_data)
		{
			$filedata = file_get_contents($file);
			$old_data = json_decode($filedata);
			if($old_data) {
				array_push($old_data,$new_data);
				$data = json_encode($old_data);
			} else {
				$data = json_encode(array($new_data));
			}
			file_put_contents($file,$data);
		}	

		public function update_data($file,$data)
		{
			file_put_contents($file,json_encode($data));
		}

		public function remove_data($file,$data)
		{
			file_put_contents($file,json_encode($data));
		}
	}