<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if(!function_exists('pre'))
{
	function pre($var)
	{
		
		echo '<pre>';
		print_r($var);
		echo '</pre>';


	}
}


if ( ! function_exists('tgl_indo'))
{
	function tgl_indo($tgl)
	{
		$ubah = gmdate($tgl, time()+60*60*8);
		$pecah = explode("-",$ubah);
		$tanggal = $pecah[2];
		$bulan = bulan($pecah[1]);
		$tahun = $pecah[0];
		return $tanggal.' '.$bulan.' '.$tahun;
	}
}

if ( ! function_exists('bulan'))
{
	function bulan($bln)
	{
		switch ($bln)
		{
			case 1:
				return "Januari";
				break;
			case 2:
				return "Februari";
				break;
			case 3:
				return "Maret";
				break;
			case 4:
				return "April";
				break;
			case 5:
				return "Mei";
				break;
			case 6:
				return "Juni";
				break;
			case 7:
				return "Juli";
				break;
			case 8:
				return "Agustus";
				break;
			case 9:
				return "September";
				break;
			case 10:
				return "Oktober";
				break;
			case 11:
				return "November";
				break;
			case 12:
				return "Desember";
				break;
		}
	}
}

if ( ! function_exists('nama_hari'))
{
	function nama_hari($tanggal)
	{
		$ubah = gmdate($tanggal, time()+60*60*8);
		$pecah = explode("-",$ubah);
		$tgl = $pecah[2];
		$bln = $pecah[1];
		$thn = $pecah[0];

		$nama = date("l", mktime(0,0,0,$bln,$tgl,$thn));
		$nama_hari = "";
		if($nama=="Sunday") {$nama_hari="Minggu";}
		else if($nama=="Monday") {$nama_hari="Senin";}
		else if($nama=="Tuesday") {$nama_hari="Selasa";}
		else if($nama=="Wednesday") {$nama_hari="Rabu";}
		else if($nama=="Thursday") {$nama_hari="Kamis";}
		else if($nama=="Friday") {$nama_hari="Jumat";}
		else if($nama=="Saturday") {$nama_hari="Sabtu";}
		return $nama_hari;
	}
}

if ( ! function_exists('hitung_mundur'))
{
	function hitung_mundur($wkt)
	{
		$waktu=array(	365*24*60*60	=> "tahun",
						30*24*60*60		=> "bulan",
						7*24*60*60		=> "minggu",
						24*60*60		=> "hari",
						60*60			=> "jam",
						60				=> "menit",
						1				=> "detik");

		$hitung = strtotime(gmdate ("Y-m-d H:i:s", time () +60 * 60 * 8))-$wkt;
		$hasil = array();
		if($hitung<5)
		{
			$hasil = 'kurang dari 5 detik yang lalu';
		}
		else
		{
			$stop = 0;
			foreach($waktu as $periode => $satuan)
			{
				if($stop>=6 || ($stop>0 && $periode<60)) break;
				$bagi = floor($hitung/$periode);
				if($bagi > 0)
				{
					$hasil[] = $bagi.' '.$satuan;
					$hitung -= $bagi*$periode;
					$stop++;
				}
				else if($stop>0) $stop++;
			}
			$hasil=implode(' ',$hasil).' yang lalu';
		}
		return $hasil;
	}
}


if(!function_exists('active_link')){
	function active_link($url)
	{

		if($url == $_SERVER['REQUEST_URI'])
		{
			return "active";
		}
	}
}

if(!function_exists('cek_user'))
{
	function cek_user($id_user)
	{
		$CI =& get_instance();
		$CI->load->database();
		$CI->db->where('id_user',$id_user);
		return $CI->db->get('users')->first_row();


	}
}



if(!function_exists('cek_item'))
{
	function cek_item($kode_item)
	{
		$CI =& get_instance();
		$CI->load->database();
		$CI->db->where('kode_barang',$kode_item);
		return $CI->db->get('scm_barang')->first_row();
	}
}


if (! function_exists('kategori'))
{
	function kategori($id)
	{
		$CI =& get_instance();
		$CI->load->database();
		$CI->db->where('id_kategori',$id);
		$query = $CI->db->get('scm_barang_kategori')->first_row();
		if ($query == TRUE) {
			return $query->nama_kategori;
		}else{
			return FALSE;
		}
	}
}


if (! function_exists('satuan'))
{
	function satuan($id)
	{
				$CI =& get_instance();
				$CI->load->database();
				$CI->db->where('id_satuan',$id);
				$query = $CI->db->get('scm_barang_satuan')->first_row();
				if ($query == TRUE) {
					return $query->tipe_satuan;
				}else{
					return FALSE;
				}
	}
}

if (! function_exists('users_group'))
{
	function users_group($id)
	{
				$CI =& get_instance();
				$CI->load->database();
				$CI->db->where('id_group',$id);
				$query = $CI->db->get('users_group')->first_row();
				if ($query == TRUE) {
					return $query->form_access;
				}else{
					return FALSE;
				}
	}
}

if (! function_exists('sppbe'))
{
	function sppbe($kode_sppbe)
	{
				$CI =& get_instance();
				$CI->load->database();
				$CI->db->where('kode_sppbe',$kode_sppbe);
				$query = $CI->db->get('scm_sppbe')->first_row();
				if ($query == TRUE) {
					return $query;
				}else{
					return FALSE;
				}
	}
}

if (! function_exists('agen'))
{
	function agen($kode_sppbe)
	{
				$CI =& get_instance();
				$CI->load->database();
				$CI->db->where('kode_agen',$kode_sppbe);
				$query = $CI->db->get('scm_agen')->first_row();
				if ($query == TRUE) {
					return $query;
				}else{
					return FALSE;
				}
	}
}


if (! function_exists('status'))
{
	function status($id)
	{
				$CI =& get_instance();
				$CI->load->database();
				
				$query = $CI->db->get_where('scm_status',['id_status'=>$id])->first_row();
				if ($query == TRUE) {
					return $query->tipe_status;
				}else{
					return 'error';
				}
	}
}



