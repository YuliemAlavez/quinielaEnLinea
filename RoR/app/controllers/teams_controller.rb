class TeamsController < ApplicationController
	def new
		@team = Team.new
	end

	def create
		@team= Team.new(team_params)
		if @team.save
			redirect_to new_team_path
		else
			render 'new'
		end
				
	end
	def edit
		@team= Team.find(params[:id])
	end

	def index
		@teams=Team.all
	end
	
	private

	def team_params
		params.require(:team).permit(:name)
	end
end