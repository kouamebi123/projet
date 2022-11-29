package gameobjects;
import java.time.Duration;
import java.time.Instant;
import java.util.ArrayList;
import java.util.List;
import java.util.Random;

import gameWorld.GameWorld;
import gameWorld.Room;
import gameobjects.Tear;
import libraries.StdDraw;
import libraries.Timer;
import libraries.Vector2;
import resources.DisplaySettings;
import resources.HeroInfos;
import resources.ImagePaths;
import resources.RoomInfos;

public class Spider extends Personage
{

	public int directions;
	public boolean n=true;
	public double timedeplace;
	
	public static double generate() {
		double randomValue = new Random().nextDouble();
		if(randomValue<0.7 && randomValue>0.3 || randomValue<0.1 || randomValue>0.9) {
			randomValue = generate();
		}
		return randomValue;
	}
	
	public Spider(Vector2 size, double speed, String imagePath, int point, int damage)
	{
		
		super(new Vector2(generate(), generate()),size,speed,imagePath,point,damage);
		Random ran = new Random();
        this.directions = ran.nextInt(4)+1;
	}
	
	public int getDirections() {
		return directions;
	}

	public void setDirections(int directions) {
		this.directions = directions;
	}

	public boolean getN() {
		return n;
	}

	public void setN(boolean n) {
		this.n = n;
	}
	
	public void deplacement() {
		this.time = (System.nanoTime()-this.startime)/1000000000;
		if(this.getN()) {
			this.setDirections(new Random().nextInt(4)+1);
			double randomValue = new Random().nextDouble();
			this.timedeplace = randomValue;
			
		}
		if(this.time>this.timedeplace && this.time<this.timedeplace+1.1) {
			//System.out.println(spider.getDirections());
			processKeysForMovementSpider();
			//System.out.println(getDirections());
			this.setN(false);
			//System.out.println(spider.n);
			//System.out.println(spider);
		}
		
		if(this.time>=this.timedeplace+1.5) {
			
			this.startime = System.nanoTime();
			this.setN(true);
			
			return;
			//monsters.remove(spider);
			//System.out.println(spider.getN());
			//System.out.println(spider);
			
		}
		
		
		
	}
	private void processKeysForMovementSpider()
	{
		
		if (this.getDirections()==1)
		{
			this.goUpNext();
		}
		if (this.getDirections()==2)
		{
			this.goDownNext();
			
		}
		if (this.getDirections()==3)
		{
			this.goRightNext();
		}
		if (this.getDirections()==4)
		{
			this.goLeftNext();
		}
		//spider.updateGameObject();
		
		
				
				
		
		
	}
}
