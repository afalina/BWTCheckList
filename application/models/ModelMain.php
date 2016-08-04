<?php
class ModelMain extends Model 
{
    public function setData($data)
    {
        $uploadDir = 'application/images';
        move_uploaded_file($data[10]['tmp_name'], $uploadDir . '/' . $data[10]['name']);
        if ($data[10]['name'] == null) $data[10]['name'] = '0.jpg';
        $part = \App\Participant::create(array(
            'firstname' => escape_html($data[0]),
            'lastname'  => escape_html($data[1]),
            'birthday'  => escape_html($data[2]),
            'report_subject' => escape_html($data[3]),
            'country'   => escape_html($data[4]),
            'phone'     => escape_html($data[5]),
            'email'     => escape_html($data[6]),
            'company'   => escape_html($data[7]),
            'position'  => escape_html($data[8]),
            'about_me'  => escape_html($data[9]),
            'photo'     => $data[10]['name']
        ));
    }

    public function getData()
    {
        return count(\App\Participant::all());
    }
}