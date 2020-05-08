$(document).ready(function() {
  if($("#reviewPTA").length > 0){
      CKEDITOR.replace( 'reviewPTA',{
          height: 550,
          toolbarGroups: [
            {
              "name": "basicstyles",
              "groups": ["basicstyles"]
            },
            {
              "name": "paragraph",
              "groups": [ 'indent', 'align', 'paragraph' ] 
            },
            { "name": 'tools', 
              "groups": [ 'tools' ] 
            },        
          ],
      });
  }

  if($("#biaya").length > 0){
    CKEDITOR.replace( 'biaya',{
      height: 300,
      toolbarGroups: [
        {
          "name": "basicstyles",
          "groups": ["basicstyles"]
        },
        {
          "name": "paragraph",
          "groups": [ 'indent', 'align',  'paragraph' ] 
        },
        { "name": 'tools', 
          "groups": [ 'tools' ] 
        },
        { "name": 'insert', 
          "groups": [ "Table" ] 
        },
        { "name": 'colors',
          "groups" : [ 'TextColor','BGColor' ] },        
      ],
    });
  }

  if($("#biaya_old").length > 0){
    CKEDITOR.replace( 'biaya_old',{
      height: 300,
      toolbarGroups: [
        {
          "name": "basicstyles",
          "groups": ["basicstyles"]
        },
        {
          "name": "paragraph",
          "groups": [ 'indent', 'align',  'paragraph' ] 
        },
        { "name": 'tools', 
          "groups": [ 'tools' ] 
        },
        { "name": 'insert', 
          "groups": [ "Table" ] 
        },
        { "name": 'colors',
          "groups" : [ 'TextColor','BGColor' ] },        
      ],
    });
  }

  if($("#jadwal_kegiatan").length > 0){
    CKEDITOR.replace( 'jadwal_kegiatan',{
      height: 300,
      toolbarGroups: [
        {
          "name": "basicstyles",
          "groups": ["basicstyles"]
        },
        {
          "name": "paragraph",
          "groups": [ 'indent', 'align',  'paragraph' ] 
        },
        { "name": 'tools', 
          "groups": [ 'tools' ] 
        },
        { "name": 'insert', 
          "groups": [ "Table" ] 
        },
        { "name": 'colors',
          "groups" : [ 'TextColor','BGColor' ] },        
      ],
    });
  }

  if($("#jadwal_kegiatan_old").length > 0){
    CKEDITOR.replace( 'jadwal_kegiatan_old',{
      height: 300,
      toolbarGroups: [
        {
          "name": "basicstyles",
          "groups": ["basicstyles"]
        },
        {
          "name": "paragraph",
          "groups": [ 'indent', 'align',  'paragraph' ] 
        },
        { "name": 'tools', 
          "groups": [ 'tools' ] 
        },
        { "name": 'insert', 
          "groups": [ "Table" ] 
        },
        { "name": 'colors',
          "groups" : [ 'TextColor','BGColor' ] },        
      ],
    });
  }

  if($("#justifikasi_anggaran").length > 0){
    CKEDITOR.replace( 'justifikasi_anggaran',{
      height: 500,
      toolbarGroups: [
        {
          "name": "basicstyles",
          "groups": ["basicstyles"]
        },
        {
          "name": "paragraph",
          "groups": [ 'indent', 'align',  'paragraph' ] 
        },
        { "name": 'tools', 
          "groups": [ 'tools' ] 
        },
        { "name": 'insert', 
          "groups": [ "Table" ] 
        },
        { "name": 'colors',
          "groups" : [ 'TextColor','BGColor' ] },        
      ],
    });
  }

  if($("#justifikasi_anggaran_old").length > 0){
    CKEDITOR.replace( 'justifikasi_anggaran_old',{
      height: 500,
      toolbarGroups: [
        {
          "name": "basicstyles",
          "groups": ["basicstyles"]
        },
        {
          "name": "paragraph",
          "groups": [ 'indent', 'align',  'paragraph' ] 
        },
        { "name": 'tools', 
          "groups": [ 'tools' ] 
        },
        { "name": 'insert', 
          "groups": [ "Table" ] 
        },
        { "name": 'colors',
          "groups" : [ 'TextColor','BGColor' ] },        
      ],
    });
  }

  if($("#susunan_organisasi").length > 0){
    CKEDITOR.replace( 'susunan_organisasi',{
      height: 100,
      toolbarGroups: [
        {
          "name": "basicstyles",
          "groups": ["basicstyles"]
        },
        {
          "name": "paragraph",
          "groups": [ 'indent', 'align',  'paragraph' ] 
        },
        { "name": 'tools', 
          "groups": [ 'tools' ] 
        },
        { "name": 'insert', 
          "groups": [ "Table" ] 
        },
        { "name": 'colors',
          "groups" : [ 'TextColor','BGColor' ] },        
      ],
    });
  }

  if($("#susunan_organisasi_old").length > 0){
    CKEDITOR.replace( 'susunan_organisasi_old',{
      height: 100,
      toolbarGroups: [
        {
          "name": "basicstyles",
          "groups": ["basicstyles"]
        },
        {
          "name": "paragraph",
          "groups": [ 'indent', 'align',  'paragraph' ] 
        },
        { "name": 'tools', 
          "groups": [ 'tools' ] 
        },
        { "name": 'insert', 
          "groups": [ "Table" ] 
        },
        { "name": 'colors',
          "groups" : [ 'TextColor','BGColor' ] },        
      ],
    });
  }

  if($("#abstrak_ind").length > 0){
      CKEDITOR.replace( 'abstrak_ind',{
          height: 275,
          toolbarGroups: [
            {
              "name": "basicstyles",
              "groups": ["basicstyles"]
            },
            {
              "name": "paragraph",
              "groups": [ 'indent', 'align', 'paragraph' ] 
            },
            { "name": 'tools', 
              "groups": [ 'tools' ] 
            },        
          ],
      });
  }

  if($("#abstrak_eng").length > 0){
      CKEDITOR.replace( 'abstrak_eng',{
          height: 400,
          toolbarGroups: [
            {
              "name": "basicstyles",
              "groups": ["basicstyles"]
            },
            {
              "name": "paragraph",
              "groups": [ 'indent', 'align', 'paragraph' ] 
            },
            { "name": 'tools', 
              "groups": [ 'tools' ] 
            },        
          ],
      });
  }

if($("#pustaka_2").length > 0){  
    CKEDITOR.replace( 'pustaka_2',{
      height: 100,
      toolbarGroups: [
        { "name": 'tools', 
          "groups": [ 'tools' ] 
        },
        { "name": 'insert', 
          "groups": [ "Table" ] 
        },        
      ],
    });
}

if($("#pustaka_2_old").length > 0){  
  CKEDITOR.replace( 'pustaka_2_old',{
    height: 100,
    toolbarGroups: [
      { "name": 'tools', 
        "groups": [ 'tools' ] 
      },
      { "name": 'insert', 
        "groups": [ "Table" ] 
      },        
    ],
  });
}


  if($("#deskripsiPoinLaporan").length > 0){
    CKEDITOR.replace( 'deskripsiPoinLaporan',{
      height: 100,
      toolbarGroups: [
        { "name": 'tools', 
          "groups": [ 'tools' ] 
        },
        {
          "name": "basicstyles",
          "groups": ["basicstyles"]
        },
        {
          "name": "paragraph",
          "groups": [ 'indent', 'align', 'paragraph' ] 
        }       
      ],
    });      
  }

  if($("#revisiLaporan").length > 0){
    CKEDITOR.replace( 'revisiLaporan',{
      height: 100,
      toolbarGroups: [
        { "name": 'tools', 
          "groups": [ 'tools' ] 
        },
        {
          "name": "basicstyles",
          "groups": ["basicstyles"]
        },
        {
          "name": "paragraph",
          "groups": [ 'indent', 'align', 'paragraph' ] 
        }       
      ],
    });      
  }

 

});