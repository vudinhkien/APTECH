<?php
class PhanTrang
{
    protected $config = array(
        'current_page'  => 1, // Trang hiện tại
        'total_record'  => 1, // Tổng số record
        'total_page'    => 1, // Tổng số trang
        'limit'         => 10,// limit
        'start'         => 0, // start
        'link_full'     => '',// Link full có dạng như sau: domain.com/index.php?view=list-view&page={page}
        'link_first'    => '',// Link trang đầu tiên
        'range'         => 9, // Số button trang bạn muốn hiển thị
        'min'           => 0, // Tham số min
        'max'           => 0  // tham số max, min và max là 2 tham số private
    );
     
    /*
     * Hàm khởi tạo ban đầu để sử dụng phân trang
     */
    function PhanTrang($config = array())
    {
        /*
         * Lặp qua từng phần tử config truyền vào và gán vào config của đối tượng
         * trước khi gán vào thì phải kiểm tra thông số config truyền vào có nằm
         * trong hệ thống config không, nếu có thì mới gán
         */
        foreach ($config as $key => $val){
            if (isset($this->config[$key])){
                $this->config[$key] = $val;
            }
        }
         
        /*
         * Kiểm tra thông số limit truyền vào có nhỏ hơn 0 hay không?
         * Nếu nhỏ hơn thì gán cho limit = 0, vì trong mysql không cho limit bé hơn 0
         */
        if ($this->config['limit'] < 0){
            $this->config['limit'] = 0;
        }
         
        /*
         * Tính total page, công tức tính tổng số trang như sau:
         * total_page = ceil(total_record/limit).
         * Tại sao lại như vậy? Đây là công thức tính trung bình thôi, ví
         * dụ tôi có 1000 record và tôi muốn mỗi trang là 100 record thì
         * đương nhiên sẽ lấy 1000/100 = 10 trang
         */
        $this->config['total_page'] = ceil($this->config['total_record'] / $this->config['limit']);
         
        /*
         * Sau khi có tổng số trang ta kiểm tra xem nó có nhỏ hơn 0 hay không
         * nếu nhỏ hơn 0 thì gán nó băng 1 ngay. Vì mặc định tổng số trang luôn bằng 1
         */
        if (!$this->config['total_page']){
            $this->config['total_page'] = 1;
        }
         
        /*
         * Trang hiện tại sẽ rơi vào một trong các trường hợp sau:
         *  - Nếu người dùng truyền vào số trang nhỏ hơn 1 thì ta sẽ gán nó = 1
         *  - Nếu trang hiện tại người dùng truyền vào lớn hơn tổng số trang
         *    thì ta gán nó bằng tổng số trang
         */
        if ($this->config['current_page'] < 1){
            $this->config['current_page'] = 1;
        }
         
        if ($this->config['current_page'] > $this->config['total_page']){
            $this->config['current_page'] = $this->config['total_page'];
        }
         
        /*
         * Trong mysql truy vấn sẽ có start và limit
         * Muốn tính start ta phải dựa vào số trang hiện tại và số limit trên mỗi trang
         * Áp dụng công thức start = (current_page - 1)*limit
        */
        $this->config['start'] = ($this->config['current_page'] - 1) * $this->config['limit'];
         
         
        // Trước tiên tính middle, đây chính là số nằm giữa trong khoảng tổng số trang
        // mà ta muốn hiển thị ra màn hình
        $middle = ceil($this->config['range'] / 2);
 
        // Ta sẽ lâm vào các trường hợp như bên dưới
        // Trong trường hợp này thì nếu tổng số trang mà bé hơn range
        // thì ta show hết luôn, không cần tính toán làm gì
        // tức là gán min = 1 và max = tổng số trang luôn
        if ($this->config['total_page'] < $this->config['range']){
            $this->config['min'] = 1;
            $this->config['max'] = $this->config['total_page'];
        }
        // Trường hợp tổng số trang mà lớn hơn range
        else
        {
            // Ta sẽ gán min = current_page - (middle + 1)
            $this->config['min'] = $this->config['current_page'] - $middle + 1;
             
            // Ta sẽ gán max = current_page + (middle - 1)
            $this->config['max'] = $this->config['current_page'] + $middle - 1;
             
            // Sau khi tính min và max ta sẽ kiểm tra
            // nếu min < 1 thì ta sẽ gán min = 1  và max bằng luôn range
            if ($this->config['min'] < 1){
                $this->config['min'] = 1;
                $this->config['max'] = $this->config['range'];
            }
             
            // Ngược lại nếu min > tổng số trang
            // ta gán max = tổng số trang và min = (tổng số trang - range) + 1
            else if ($this->config['max'] > $this->config['total_page'])
            {
                $this->config['max'] = $this->config['total_page'];
                $this->config['min'] = $this->config['total_page'] - $this->config['range'] + 1;
            }
        }
    }
     
    /*
     * Hàm lấy link theo trang
     */
    private function url($page)
    {
        // Nếu trang < 1 thì ta sẽ lấy link first
        if ($page <= 1 && $this->config['link_first']){
            return $this->config['link_first'];
        }
        // Ngược lại ta lấy link_full
        // Như tôi comment ở trên, link full có dạng domain.com/index.php?view=list-view&page={page}.
        // Trong đó {page} là nơi bạn muốn số trang sẽ thay thế vào
        return str_replace('{page}', $page, $this->config['link_full']);
    }
     
    /*
     * Hàm lấy mã html
     * Hàm này in ra các trang mà ta đã phân chia ở trên. Ta dùng chuẩn ul để in ra. Style được đưa và class pagination. Tùy theo từng giao diện mà ta sẽ định nghĩa CSS cho class pagination đó
     */
    function html()
    {  
        $p = '';
        if ($this->config['total_record'] > $this->config['limit'])
        {
            $p = '<ul class="pagination">';
             
            // Nút prev và first
            if ($this->config['current_page'] > 1)
            {
                $p .= '<li><a href="'.$this->url('1').'">First</a></li>';
                $p .= '<li><a href="'.$this->url($this->config['current_page']-1).'">Prev</a></li>';
            }
             
            // lặp trong khoảng cách giữa min và max để hiển thị các nút
            for ($i = $this->config['min']; $i <= $this->config['max']; $i++)
            {
                // Trang hiện tại
                if ($this->config['current_page'] == $i){
                    $p .= '<li><span>'.$i.'</span></li>';
                }
                else{
                    $p .= '<li><a href="'.$this->url($i).'">'.$i.'</a></li>';
                }
            }
 
            // Nút last và next
            if ($this->config['current_page'] < $this->config['total_page'])
            {
                $p .= '<li><a href="'.$this->url($this->config['current_page'] + 1).'">Next</a></li>';
                $p .= '<li><a href="'.$this->url($this->config['total_page']).'">Last</a></li>';
            }
             
            $p .= '</ul>';
        }
        return $p;
    }
}
 
?>