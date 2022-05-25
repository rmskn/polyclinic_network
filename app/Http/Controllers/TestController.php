<?php

namespace App\Http\Controllers;

class TestController
{
    public function test()
    {
        dd('sss');
    }

    public function test2()
    {
        $json = '[
  {
    "item_id": 1,
    "name": "Maxwells Pink",
    "description": "30ml salt nicotine 12mg",
    "price": "550 rub",
    "category": "liquid",
    "image": "https://vapeclub.kz/image/cache/catalog/product/liquid/Maxwells%20SALT%2030%20%D0%BC%D0%BB%20PINK-800x800.jpeg",
    "reviews": [
      {
        "review_id": 1,
        "item_id": 1,
        "user_id": 1,
        "text": "Максвелс, как всегда на высоте!",
        "date": "2022-01-05T10:26:16+00:00"
      },
      {
        "review_id": 2,
        "item_id": 1,
        "user_id": 2,
        "text": "Кайфарики",
        "date": "2022-01-07T14:12:18+00:00"
      }
    ]
  },
  {
    "item_id": 2,
    "name": "The Cannibals King",
    "description": "30ml salt nicotine 20mg",
    "price": "500 rub",
    "category": "liquid",
    "image": "https://zaparvape.ru/wa-data/public/shop/products/00/webp/72/36/3672/images/7497/7497.970.webp",
    "reviews": []
  },
  {
    "item_id": 3,
    "name": "Jam Monster",
    "description": "100ml 0mg",
    "price": "1200 rub",
    "category": "liquid",
    "image": "https://monstervapelabs.com/wp-content/uploads/2021/04/JM_Blackberry_0MG_100ML.png",
    "reviews": []
  },
  {
    "item_id": 4,
    "name": "The Scandalist - Apple Jesus",
    "description": "58ml 0mg",
    "price": "600 rub",
    "category": "liquid",
    "image": "https://static.insales-cdn.com/images/products/1/3031/398756823/The_Scandalist_-_Apple_Jesus__58_%D0%BC%D0%BB_.jpg",
    "reviews": []
  },
  {
    "item_id": 5,
    "name": "Vandy Vape Phobia",
    "description": "RDA",
    "price": "2200 rub",
    "category": "accessory",
    "image": "https://iowaecigs.com/site/wp-content/uploads/2021/06/products-2SSFKAQ7TyKPeZH2qxy0_phobia_black.jpg",
    "reviews": []
  },
  {
    "item_id": 6,
    "name": "Voopoo Drag 2",
    "description": "Color: Ink",
    "price": "4200 rub",
    "category": "MOD",
    "image": "https://in2vape.com/wp-content/uploads/2019/01/voopoo_drag_2_177w_uforce_t2_starter_kit_ink_color_1200x1200.jpg",
    "reviews": []
  },
  {
    "item_id": 7,
    "name": "Wick N Vape Prime",
    "description": "Cotton Bacon",
    "price": "400 rub",
    "category": "accessory",
    "image": "https://www.healthcabin.net/images/products/cotton-bag-11.jpg",
    "reviews": []
  },
  {
    "item_id": 8,
    "name": "Cult Passion",
    "description": "60ml 3mg",
    "price": "600 rub",
    "category": "liquid",
    "image": "https://parilka.store/images/products/1546/10f51181966843d22f02b5ae27da096df05d3a63.jpg",
    "reviews": []
  },
  {
    "item_id": 9,
    "name": "Bad Drip Bad Blood",
    "description": "60ml 3mg",
    "price": "1300 rub",
    "category": "liquid",
    "image": "https://cdn.shopify.com/s/files/1/1344/9499/products/bad-drip-labs-bad-blood-ejuice-416359_462x462.png?v=1622579428",
    "reviews": []
  },
  {
    "item_id": 10,
    "name": "Smoant Santi",
    "description": "Color: Rainbow",
    "price": "2400 rub",
    "category": "POD",
    "image": "https://cdn.shopify.com/s/files/1/0524/4921/4664/products/smoant_santi_40w_pod_system_kit_14.jpg?v=1612419861",
    "reviews": []
  },
  {
    "item_id": 11,
    "name": "Smoant Karat",
    "description": "Color: Gradient blue",
    "price": "1500 rub",
    "category": "POD",
    "image": "https://www.sourcemore.com/media/catalog/product/cache/1/image/800x/1fc6b9195d4f54c05daa219a98bcb3d5/g/r/gradient_blue.jpg",
    "reviews": []
  },
  {
    "item_id": 12,
    "name": "Smoant Battlestar Baby",
    "description": "Color: Black",
    "price": "2000 rub",
    "category": "POD",
    "image": "https://www.vardex.ru/upload/iblock/9d9/nabor-smoant-battlestar-baby-black-chernyj.jpg",
    "reviews": []
  },
  {
    "item_id": 13,
    "name": "Vapor Storm Puma",
    "description": "Color: Limited edition",
    "price": "2600 rub",
    "category": "MOD",
    "image": "https://d1844rainhf76j.cloudfront.net/product_images/pimage_60958_1539653323_w.JPG",
    "reviews": []
  },
  {
    "item_id": 14,
    "name": "Rincoe Manto Beast",
    "description": "Color: Devil Bull",
    "price": "2800 rub",
    "category": "MOD",
    "image": "https://cdn.shopify.com/s/files/1/0292/5123/9989/products/mantobeastdevilbull.png?v=1620028767",
    "reviews": []
  },
  {
    "item_id": 15,
    "name": "Испаритель на Smoant Santi",
    "description": "0.4ohm",
    "price": "250 rub",
    "category": "accessory",
    "image": "https://irkutsk.parosigara.ru/upload/delight.webpconverter/upload/resize_cache/iblock/e23/400_400_140cd750bba9870f18aada2478b24840a/e23b52c27791cad8b982d25baac34ec3.jpg.webp?16313739554146",
    "reviews": []
  },
  {
    "item_id": 16,
    "name": "Атомайзер Eleaf ELLO Duro",
    "description": "Color: Red",
    "price": "2300 rub",
    "category": "accessory",
    "image": "https://www.vardex.ru/upload/resize_cache/iblock/80b/400_400_040cd750bba9870f18aada2478b24840a/ELLO-Duro_01%D1%83.png",
    "reviews": []
  },
  {
    "item_id": 17,
    "name": "Аккумулятор SONY 18650 VTC6",
    "description": "3000 mAh, 30А",
    "price": "800 rub",
    "category": "accessory",
    "image": "https://www.vapeloft.com/wp-content/uploads/2019/06/Sony-VTC-6-High-Drain-Battery.jpg",
    "reviews": []
  },
  {
    "item_id": 18,
    "name": "Зарядное устройство LiitoKala Lii-500S",
    "description": "4 slots",
    "price": "3000 rub",
    "category": "accessory",
    "image": "https://canary.contestimg.wish.com/api/webimage/5f1a5f853228f82c58b4dace-large.jpg?cache_buster=9583f1d65ae84de7c05eeff15c81a096",
    "reviews": []
  }
]';
        return $json;
    }
}
