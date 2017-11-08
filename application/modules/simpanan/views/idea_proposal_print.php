<h1 align="center"> LISTING IDEA PROPOSAL </h1>
 
<!-- id
no_reg
id_peg
nama
nrp
seksi
risalah
tanggal
tema_ip
ksp
upload_ksp
kstp
upload_kstp
akibat
standarisasi
upload_standarisasi
manfaat
komentar_foreman
penilaian_foreman
komentar_aprove_kasie
komentar_aprove_ahmic
is_aprove_kasie
is_aprove_ahmic-->
<table style="width:100%;" cellpadding="2" cellspacing="1" border="1">
    <tr>
        <td style="width:20%;"> NO Reg </td>
        <td style="width:10%;"> : </td>
        <td style="width:70%;"> <?php echo $listing->no_reg; ?> </td>
    </tr>
    <tr>
        <td style="width:20%;"> Nama </td>
        <td style="width:10%;"> : </td>
        <td style="width:70%;"> <?php echo $listing->nama; ?> </td>
    </tr>
    <tr>
        <td style="width:20%;"> NRP </td>
        <td style="width:10%;"> : </td>
        <td style="width:70%;"> <?php echo $listing->nrp; ?> </td>
    </tr>
    <tr>
        <td style="width:20%;"> Seksi </td>
        <td style="width:10%;"> : </td>
        <td style="width:70%;"> <?php echo $listing->seksi; ?> </td>
    </tr>
    <tr>
        <td style="width:20%;"> Risalah </td>
        <td style="width:10%;"> : </td>
        <td style="width:70%;"> <?php echo $listing->risalah; ?> </td>
    </tr>
    <tr>
        <td style="width:20%;"> Tanggal </td>
        <td style="width:10%;"> : </td>
        <td style="width:70%;"> <?php echo $listing->tanggal; ?> </td>
    </tr>
    <tr>
        <td style="width:20%;"> Tema Idea Proposal </td>
        <td style="width:10%;"> : </td>
        <td style="width:70%;"> <?php echo $listing->tema_ip; ?> </td>
    </tr>
    <tr>
        <td style="width:20%;"> Kondisi Sebelum Perbaikan </td>
        <td style="width:10%;"> : </td>
        <td style="width:70%;"> <?php echo $listing->ksp; ?> </td>
    </tr>
    <tr>
        <td style="width:20%;"> Foto Kondisi Sebelum Perbaikan </td>
        <td style="width:10%;"> : </td>
        <td style="width:70%;"> <img src="<?php echo base_url('uploads/' . "$listing->upload_ksp"); ?>" style="width: 1000%; height: 1000%;"> </td>
    </tr>   
    <tr>
        <td style="width:20%;"> Kondisi Setelah Perbaikan </td>
        <td style="width:10%;"> : </td>
        <td style="width:70%;"> <?php echo $listing->kstp; ?> </td>
    </tr>
    <tr>
        <td style="width:20%;"> Foto Kondisi Setelah Perbaikan </td>
        <td style="width:10%;"> : </td>
        <td style="width:70%;"> <img src="<?php echo base_url('uploads/' . "$listing->upload_kstp"); ?>" style="width: 1000%; height: 1000%;"> </td>
    </tr>
    <tr>
        <td style="width:20%;"> Akibat </td>
        <td style="width:10%;"> : </td>
        <td style="width:70%;"> <?php echo $listing->akibat; ?> </td>
    </tr>
    <tr>
        <td style="width:20%;"> Standarisasi </td>
        <td style="width:10%;"> : </td>
        <td style="width:70%;"> <?php echo $listing->standarisasi; ?> </td>
    </tr>
    <tr>
        <td style="width:20%;"> Foto Standarisasi </td>
        <td style="width:10%;"> : </td>
        <td style="width:70%;"> <img src="<?php echo base_url('uploads/' . "$listing->upload_standarisasi"); ?>" style="width: 1000%; height: 1000%;"> </td>
    </tr>
    <tr>
        <td style="width:20%;"> Manfaat </td>
        <td style="width:10%;"> : </td>
        <td style="width:70%;"> <?php echo $listing->manfaat; ?> </td>
    </tr>
    <tr>
        <td style="width:20%;"> Komentar Foreman </td>
        <td style="width:10%;"> : </td>
        <td style="width:70%;"> <?php echo $listing->komentar_foreman; ?> </td>
    </tr>
    <tr>
        <td style="width:20%;"> Penilaian Foreman </td>
        <td style="width:10%;"> : </td>
        <td style="width:70%;"> <?php echo $listing->penilaian_foreman; ?> </td>
    </tr>
    <tr>
        <td style="width:20%;"> Aproval Kasie </td>
        <td style="width:10%;"> : </td>
        <td style="width:70%;"> <?php if($listing->is_aprove_kasie == '1') {echo "Aproved"; }else{ "Rejected"; } ?> </td>
    </tr>
    <tr>
        <td style="width:20%;"> Komentar Kasie </td>
        <td style="width:10%;"> : </td>
        <td style="width:70%;"> <?php echo $listing->komentar_aprove_kasie; ?> </td>
    </tr>
    <tr>
        <td style="width:20%;"> Aproval AHMIC </td>
        <td style="width:10%;"> : </td>
        <td style="width:70%;"> <?php if($listing->is_aprove_ahmic == '1') {echo "Aproved"; }else{ "Rejected"; } ?> </td>
    </tr>
    <tr>
        <td style="width:20%;"> Komentar AHMIC </td>
        <td style="width:10%;"> : </td>
        <td style="width:70%;"> <?php echo $listing->komentar_aprove_ahmic; ?> </td>
    </tr>
</table>