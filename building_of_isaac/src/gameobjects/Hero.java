package gameobjects;
import libraries.Vector2;
import resources.HeroInfos;
import resources.ImagePaths;

public class Hero extends Personage
{

	private int nb_piece;
	private int nb_piece_max;
	private int max_point;
	private double TimeLatence = 400;
	public Hero(Vector2 position, Vector2 size, double speed, String imagePath, double carry, int point, int damage,int nb_piece_max)
	{
		super(position,size,speed,imagePath,carry,point,damage);
		this.nb_piece = nb_piece_max - 10;
		this.nb_piece_max = nb_piece_max;
		this.max_point = point;
	}
	
	protected void move()
	{
		super.move();
		if(((System.nanoTime()-this.startime1)/1000000000)>1.7) {
			if(this.contact) {
				this.contact = false;
				this.startime1 = System.nanoTime();
			}
			
		
	}
		
	}
	
	public void TearUpNext()
	{
		this.time = (System.nanoTime()-startime1)/1000000;
		if(this.time>TimeLatence) {
			Tear bal = new Tear(position, HeroInfos.TEAR_SIZE, HeroInfos.TEAR_SPEED, ImagePaths.TEAR,0.3,0.0);
			this.tearList.add(bal);
			this.startime1 = System.nanoTime();
		}
		
	}

	public void TearDownNext()
	{
		this.time = (System.nanoTime()-startime1)/1000000;
		if(this.time>TimeLatence) {
			Tear bal = new Tear(position, HeroInfos.TEAR_SIZE, HeroInfos.TEAR_SPEED, ImagePaths.TEAR,-0.3,0.0);
			this.tearList.add(bal);
			this.startime1 = System.nanoTime();
			
		}
		
	}
	public void TearRightNext()
	{
		this.time = (System.nanoTime()-startime1)/1000000;
		if(this.time>TimeLatence) {
			Tear bal = new Tear(position, HeroInfos.TEAR_SIZE, HeroInfos.TEAR_SPEED, ImagePaths.TEAR,0.0,0.3);
			this.tearList.add(bal);
			this.startime1 = System.nanoTime();
		}
		
	}
	public void TearLeftNext()
	{
		this.time = (System.nanoTime()-startime1)/1000000;
		if(this.time>TimeLatence) {
			Tear bal = new Tear(position, HeroInfos.TEAR_SIZE, HeroInfos.TEAR_SPEED, ImagePaths.TEAR,0.0,-0.3);
			this.tearList.add(bal);	
			this.startime1 = System.nanoTime();
		}
		
	}

	public int getNb_piece() {
		return nb_piece;
	}

	public void setNb_piece(int nb_piece) {
		this.nb_piece = nb_piece;
	}

	public int getNb_piece_max() {
		return nb_piece_max;
	}

	public void setNb_piece_max(int nb_piece_max) {
		this.nb_piece_max = nb_piece_max;
	}

	public int getMax_point() {
		return max_point;
	}

	public void setMax_point(int max_point) {
		this.max_point = max_point;
	}
	
	
}
