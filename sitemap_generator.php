<?php
	// setting up the xml
	$xml = new DomDocument('1.0', 'utf-8'); 
	$xml->formatOutput = true; 

	// creating base node
	$urlset = $xml->createElement('urlset'); 
	$urlset->appendChild(
		new DomAttr('xmlns', 'http://www.sitemaps.org/schemas/sitemap/0.9')
	);

	// appending urlset node
	$xml->appendChild($urlset);

	// declaring array for entries
	$entries = array();

	// example array
	/*
	$entries = array(
		array('permalink'=>'http://myadress.com/page1',
			'lastmod'=>'YYYY-MM-DDThh:mmTZD', // format is YYYY-MM-DDThh:mmTZD
			'changefreq'=>'monthly',
			'priority'=>'1.0' // 0.1-1.0
		)
	);
	*/

	// appending content to xml-document
	foreach($entries as $key => $value) {

		// declaring variables for content
		$permalink = $value['permalink'];
		$lastmod = $value['lastmod'];
		$changefreq = $value['changefreq'];
		$priority = $value['priority'];

		// creating single url node
		$url = $xml->createElement('url'); 

		// filling node with entry info
		$url->appendChild($xml->createElement('loc', $permalink));
		$url->appendChild($xml->createElement('lastmod', $lastmod));
		$url->appendChild($xml->createElement('changefreq', $changefreq));
		$url->appendChild($xml->createElement('priority', $priority));

		// appending url to urlset node
		$urlset->appendChild($url);

	}

	$xml->save('sitemap.xml');
?>
