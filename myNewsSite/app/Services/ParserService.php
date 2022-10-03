<?php

declare(strict_types=1);

namespace App\Services;

use App\Services\Contracts\Parser;
use Orchestra\Parser\Xml\Facade as XmlParser;
use Illuminate\Support\Facades\Storage;
use App\Models\Article;
use App\Models\Category;


class ParserService implements Parser
{
   private string $link;
    
    public function setLink(string $link): self
    {
        $this->link = $link;
        return $this;
    }

    public function saveParseData(): void
    {
        $xml = XmlParser::load($this->link);
        $data = $xml->parse([
                    'title' => [
                        'uses' => 'channel.title'
                    ],
                    'link' => [
                        'uses' => 'channal.link'
                    ],
                    'description' => [
                        'uses' => 'channal.description'
                    ],
                    'image' => [
                        'uses' => 'channal.image'
                    ],
                    'news' => [
                        'uses' => 'channal.item[title, link, author, description, pubDate]'
                    ]
                ]);

        $e = explode("/", $this->link);
        $fileName = end($e);
        $categories = Category::all();
        
        foreach($categories as $category) {
           if($category->title === $fileName) {
             $data['category_id'] = $category->id;
             Article::create($data);  
           }
           
        }
        
       // return "Parsing complited";
       
        //$jsonEncode = json_encode($data);
       
       // Storage::append("news/". $fileName, $jsonEncode);
    
    }
    
}