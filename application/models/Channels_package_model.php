<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Channels_package_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    public function get_compact() {
        $items = $this->get_all_channels_packages();
        $return = array();
        foreach($items as $item) {
            if(!isset($return[$item['channel_id']])) {
                $return[$item['channel_id']] = array();
            }
            $return[$item['channel_id']][] = $item['package_id'];
        }
        return $return;
    }

    public function add($chid, $pkgid) {
        $this->db->set('channel_id', $chid);
        $this->db->set('package_id', $pkgid);
        $this->db->insert('channels_packages');
        return $this->db->insert_id();
    }

    public function rm($chid, $pkgid) {
        $this->db->where('channel_id', $chid);
        $this->db->where('package_id', $pkgid);
        return $this->db->delete('channels_packages');
    }
    
    /*
     * Get channels_package by channel_id
     */
    function get_channels_package($channel_id)
    {
        return $this->db->get_where('channels_packages',array('channel_id'=>$channel_id))->row_array();
    }
        
    /*
     * Get all channels_packages
     */
    function get_all_channels_packages()
    {
        $this->db->order_by('channel_id', 'desc');
        return $this->db->get('channels_packages')->result_array();
    }
        
    /*
     * function to add new channels_package
     */
    function add_channels_package($params)
    {
        $this->db->insert('channels_packages',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update channels_package
     */
    function update_channels_package($channel_id,$params)
    {
        $this->db->where('channel_id',$channel_id);
        return $this->db->update('channels_packages',$params);
    }
    
    /*
     * function to delete channels_package
     */
    function delete_channels_package($channel_id)
    {
        return $this->db->delete('channels_packages',array('channel_id'=>$channel_id));
    }
}
