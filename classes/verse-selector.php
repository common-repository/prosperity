<?php
  class Prosperity_Verses {
	  public function __construct	() {
		  
	  }
	  
	  public function get_verse() {
		  $verse = array(
		  "The Lord is my Shepard [to feed, guide, and shield me], I shall not lack. - <em>Psalm 23:1</em>",
		  "If you are willing and obedient, you shall eat the good of the land; - <em>Isaiah 1:19</em>",
		  "Delight yourself also in the Lord, and He will give you the desires <em>and</em> secret petitions of your heart. - <em>Psalm 37:4</em>",		
		  "He who gives to the poor will not lack, But he who hides his eyes will have many curses. - <em>Proverbs 28:27</em>",
		  "And my God will liberally supply (fill to the full) your every need according to His riches in glory in Christ Jesus. - <em>Philippians 4:19</em>",		
		  "The generous soul will be made rich, And he who waters will also be watered himself. - <em>Proverbs 11:25</em>",
		  "He who did not withhold <em>or</em> spare [even] His own Son but gave Him up for us all, will He not also with Him freely <em>and</em> graciously give us all [other] things? - <em>Romans 8:32</em>",
		  "He who has pity on the poor lends to the LORD, And He will pay back what he has given. - <em>Proverbs 19:17</em>",
		  "And as for you, be fruitful and multiply; bring forth abundantly in the earth and multiply in it. - <em>Genesis 9:7</em>",
		  "But this I say: He who sows sparingly will also reap sparingly, and he who sows bountifully will also reap bountifully. - <em>2 Corinthians 9:6</em>",		
		  "And his master saw that the Lord was with him and that the Lord made all he did to prosper in his hand. - <em>Genesis 39:3</em>",
		  "And you shall remember the Lord your God, for it is He who gives you power to get wealth, that He may establish His covenant which He swore to your fathers, as it is this day. - <em>Deuteronomy 8:18</em>",
		  "Blessed shall you be in the city, and blessed shall you be in the country. - <em>Deuteronomy 28:3</em>",
		  "Blessed shall you be when you come in, and blessed shall you be when you go out. - <em>Deuteronomy 28:6</em>",
		  "The Lord will open to you His good treasure, the heavens, to give the rain to your land in its season, and to bless all the work of your hand. You shall lend to many nations, but you shall not borrow. - <em>Deuteronomy 28:12</em>",
		  "Therefore keep the words of this covenant, and do them, that you may prosper in all that you do. - <em>Deuteronomy 29:9</em>",
		  "The young lions lack and suffer hunger; But those who seek the Lord shall not lack any good thing. - <em>Psalm 34:10</em>",
		  "He who has a bountiful eye will be blessed, for he gives of his bread to the poor. - <em>Proverbs 22:9</em>",
		  "And God is able to make all grace abound toward you, that you, always having all sufficiency in all things, have an abundance for every good work. - <em>2 Corinthians 9:8</em>",
		  "Give, and it will be given to you: good measure, pressed down, shaken together, and running over will be put into your bosom. For with the same measure that you use, it will be measured back to you. - <em>Luke 6:38</em>",
		  "'For I know the plans I have for you,' declares the Lord, 'plans to prosper you and not to harm you, plans to give you hope and a future.' - <em>Jeremiah 29:11</em>",
		  "I was young and now I am old, yet I have never seen the righteous forsaken or their children begging bread. They are always generous and lend freely; their children are blessed. - <em>Psalm 37:25-26</em>",
		  "The Lord will indeed give what is good, and our land will yield its harvest. - <em>Psalm 85:12</em>",
		  "Honor the Lord with your wealth, with the firstfruits of all your crops; then your barns will be filled to the overflowing, and your vats will brim over with new wine. - <em>Proverbs 3:9-10</em>",
		  "But as for you, be strong and do not give up, for your work will be rewarded. - <em>2 Chronicles 15:7</em>"
					 );	
  
		  // get random index number	
		  $index = mt_rand( 0, count( $verse ) - 1 );
		  
		  // And then randomly choose a line
		  return wptexturize( $verse[ $index ] );
	  }
  }
  
?>